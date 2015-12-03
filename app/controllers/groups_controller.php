<?php
class GroupsController extends AppController {

	var $name = 'Groups';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Grupos","Clientes","GruposClientes");
    
    function add($action)
    {
        $title = "Agregar Grupo";
        $this->set("title_for_layout",$title);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function setDefault()
    {
        $this->set("chk",''); 
        $this->set("g_c",'');
        $this->set("g_s",$_SESSION['GROUP']);
        $this->set("GruposCliente",array());
    }
    
    function validateVocal($string,$type)
    {
        switch($type)
        {
            case 'a':
                $chars = array('a','e','i','o','u');
                break;
            case 'b':
                $chars = array(
                               'b','c','d','f',
                               'g','h','j','k',
                               'l','m','n','p',
                               'q','r','s','t',
                               'v','w','x','y',
                               'z'
                              );
                break;
            case 'n':
                $chars = array(
                               '7','8','9',
                               '4','5','6',
                               '1','2','3',
                                   '0'
                              );
                break;
        }
        
        $c=0;
        foreach($chars as $findme)
        {
            $pos = strpos($string, $findme);
            if ($pos !== false)
            {
                $c++;
            }
        }
        return $c;
    }
    
    function addGroups()
    {
        //pr($this->data);exit();
        $save = true;
        $messages = array();
        $msg1='';
        $vocal_nombre =  $this->validateVocal(trim($this->data['Grupos']['descripcion']),'a');
        $conso_nombre =  $this->validateVocal(trim($this->data['Grupos']['descripcion']),'b');
        if($vocal_nombre == 0 || $conso_nombre == 0)
        {
           $msg1 = '<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>El Nombre del Grupo parece no tener coherencia.</strong><br/>
                    </div>';
           $save = false;
        }
        
        array_push($messages, $msg1);
        
        $this->Grupos->set($this->data['Grupos']);
        if($this->Grupos->validates() && $save === true)
        {
            
            if($this->Grupos->save())
            {
                e('<div class="alert alert-success" role="alert" id="msgGroups">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Grupo Registrado</strong>
                  </div>');
                e('<script>window.setTimeout(function() {
                jQuery("#msgGroups").fadeTo(500, 0).slideUp(500, function(){
                    jQuery(this).remove(); 
                });
                }, 400);</script>'
            );
                e('<script>document.getElementById("groups").reset();</script>');
                e("<script>jQuery('#barr_groups').css('width','1%');</script>");
            }

                    
        }else{                
                $this->set('validationErrorsArray', $this->Grupos->invalidFields());
                e('<div class="alert alert-danger" role="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Ingresar datos requeridos</strong><br/>
                  </div>');
                
                $IvalidFieldes = $this->Grupos->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                
                
                $PB = 70;
                foreach($messages as $msgs)
                {
                    e($msgs);
                }
                
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>'.$iF.'</strong><br/>
                      </div>');
                    e("<script>jQuery('#barr_groups').css('width','$PB%');</script>");
                }
                e("<script>jQuery('#barr_groups').css('width','50%');</script>");
               
        }
        
    }
    
    function search() {
        $_SESSION['GROUP'] = '';
        $this->customersGroups();
        $this->render('customersGroups');
	}

    function customersGroups()
    {
        $_SESSION['GROUP'] = '';
        $this->setDefault();
        
        $title = "Asignar Cliente(s) a un Grupo";
        $this->set("title_for_layout",$title);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
        
        $conditions = array("Clientes.status_id"=>1);
        $this->set("Clientes",$this->Clientes->find("all",array("conditions"=>$conditions,"order"=>array("Clientes.categoria_id","Clientes.nombre"))));
        $this->set("Grupos",$this->Grupos->find("list",array("fields"=>array("grupo_id","descripcion"),"order"=>array("Grupos.descripcion"))));
    }
    
    function chooseGroup()
    {
        $_SESSION['GROUP'] = $this->data['GruposClientes']['grupo_id'];
        $this->setDefault();
        
        $conditions = array("Clientes.status_id"=>1);
        $this->set("Clientes",$this->Clientes->find("all",array("conditions"=>$conditions,"order"=>array("Clientes.categoria_id","Clientes.nombre"))));

    }
    
    function updateCustomerGroups($id)
    {
        $this->data['GruposClientes']['cliente_id'] = $id;
        $this->data['GruposClientes']['grupo_id']   = $_SESSION['GROUP'];
        
        $gc = $this->GruposClientes->find("first",array("conditions"=>array("GruposClientes.cliente_id"=>$id,"GruposClientes.grupo_id" => $_SESSION['GROUP'])));
        
        if($_SESSION['GROUP'] !=='')
        {
            if(!$gc)
            {
                $this->GruposClientes->set($this->data);

                if($this->GruposClientes->save($this->data))
                {
                    e('<div class="alert alert-success" role="alert" id="msgGroups">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Registrando Cliente en el Grupo seleccionado</strong>
                      </div>');
                    e('<script>window.setTimeout(function() {
                        jQuery("#msgGroups").fadeTo(500, 0).slideUp(500, function(){
                            jQuery(this).remove(); 
                        });
                        }, 800);</script>'
                    );
                }
            }else{
                    $this->GruposClientes->delete($gc['GruposClientes']['grupo_cliente_id']);
                    e('<div class="alert alert-warning" role="alert" id="msgGroups">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Removiendo Cliente del Grupo</strong>
                              </div>');
                    e('<script>window.setTimeout(function() {
                        jQuery("#msgGroups").fadeTo(500, 0).slideUp(500, function(){
                            jQuery(this).remove(); 
                        });
                        }, 800);</script>'
                    );
            
                }
        }else{
                e('<div class="alert alert-warning" role="alert" id="msgWarning">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Debe seleccionar un Grupo para Asignar el Cliente deseado</strong>
                  </div>');
                
        }
        //exit();
    }
    
    function searchCustomer()
    {
        $this->setDefault();
        $palabra = $this->data['Busqueda']['palabra_clave'];
        
        if($palabra !=='')
        {
            if($palabra!=='*')
            {
                $OR = array(
                        "Clientes.nombre LIKE",
                        "Clientes.apellidos LIKE",
                        "Clientes.folio  LIKE",
                        "Categorias.descripcion LIKE"
                      );
                
                $palabra = explode(" ",$palabra);
                $o_r = '';
                $x=0;
                 foreach($OR as $or)
                 {
                     foreach($palabra as $p)
                     {
                         $o_r .= $or." '%$p%' OR ";
                     }
                 }
                $o_r = rtrim($o_r,"OR ");
                $o_r = explode("OR",$o_r);
                $conditions['OR'] = $o_r; 
                $this->set("Clientes",$this->Clientes->find("all",array("conditions"=>$conditions,"order"=>array("Clientes.categoria_id","Clientes.nombre"))));
           }else
               {
                    $this->set("Clientes",$this->Clientes->find("all",array("order"=>array("Clientes.categoria_id","Clientes.nombre"))));
               }
        }else{
             e('<div class="alert alert-warning" role="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Ingrese una palabra clave</strong>
                </div>');
             exit();
        }
        
    }
    
}