<?php
class CustomerController extends AppController {

	var $name = 'Customer';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Clientes","Categorias","DatosClientes","Paises","Estados","Ciudades");
    
    function add($action)
    {
        $title = "Alta Clientes";
        $this->set("title_for_layout",$title);
        $this->set("Categorias",$this->Categorias->find("list",array("fields"=>array("categoria_id","nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        
        $this->set("Paises",$this->Paises->find("list",array("fields"=>array("Code","Name"),"order"=>"Name")));
        $this->set("Estados",$this->Estados->find("list",array("fields"=>array("Name","Name"),
                                                  "conditions"=>array("Country"=>"MEX"),
                                                  "order" => "Name"
                                                              )
                                                 )
                  );
        $this->set("Ciudades",$this->Ciudades->find("list",array("fields"=>array("Name","Name"),
                                                    "conditions"=>array("Province"=>"Veracruz"),
                                                     "order" => "Name"
                                                              )
                                                 )
                  );
        
        $this->set("Generos",$Generos);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function addCustomer()
    {
        #print_r($this->data);exit();
        $fecha_hoy = date("Y-m-d");
        $save =true;
        $messages = array();
        $msg1 =''; $msg2=''; $msg3='';
        $fecha_sys = $this->data['Clientes']['fecha_nacimiento'];
        if($fecha_hoy < $fecha_sys )
        {
            $msg1 = '<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Fecha incorrecta</strong><br/>
              </div>';
            $save  = false;
        }
        
        $pais   = $this->data['DatosClientes']['pais_id'];
        $estado = $this->data['DatosClientes']['estado_id'];
        $ciudad = $this->data['DatosClientes']['ciudad_id'];
        
        if($pais =='' || $estado =='' || $ciudad =='')
        {
            $msg2 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Localidad incorrecta</strong><br/>
              </div>';
            $save = false;
        }
        
        
        
        $dir1 = $this->data['DatosClientes']['calle'];
        $dir2 = $this->data['DatosClientes']['numero'];
        $dir3 = $this->data['DatosClientes']['colonia'];
        $dir4 = $this->data['DatosClientes']['cpostal'];
        
        if($dir1 =='' || $dir2 =='' || $dir3 =='' || $dir4 =='')
        {
            $msg3 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Debe ingresar todos los datos del apartado "Dirección"</strong><br/>
              </div>';
           
            $save = false;
        }
        
        if(strlen($dir4) < 5)
        {
            $msg4 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>El Código Postal debe ser de 5 caracteres</strong><br/>
              </div>';
           
            $save = false;
        }
        
        array_push($messages, $msg1, $msg2, $msg3, $msg4);
        $this->Clientes->set($this->data['Clientes']);
        if($this->Clientes->validates())
        {
            if($save === true){
                if($this->Clientes->save($this->data['Clientes']))
                {
                    $LastIdCustomer = $this->Clientes->getLastInsertId();
                    $this->data['DatosClientes']['cliente_id'] = $LastIdCustomer;
                    if($this->DatosClientes->save($this->data['DatosClientes']))
                    {
                        e('<div class="alert alert-success" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Cliente Registrado</strong>
                              </div>');
                        e("<script>jQuery('#barr_customers').css('width','100%');</script>");
                        e('<script>document.getElementById("customers").reset();</script>');
                        e("<script>jQuery('#barr_customers').css('width','1%');</script>");
                    }
                }
                
            }else{
                foreach ($messages as $msgs)
                {
                    e($msgs);
                }
                e("<script>jQuery('#barr_customers').css('width','1%');</script>");
            }   
        }else{
                $this->set('validationErrorsArray', $this->Clientes->invalidFields());
                e('<div class="alert alert-danger" role="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Ingresar datos requeridos</strong><br/>
                  </div>');
                
                $IvalidFieldes = $this->Clientes->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                $PB = count($IvalidFieldes);
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>'.$iF.'</strong><br/>
                      </div>');
                    e("<script>jQuery('#barr_customers').css('width','$PB%');</script>");
                }
                foreach ($messages as $msgs)
                {
                    e($msgs);
                }
                
            }
                 
        
    }
    
    function search()
    {
        
	}
    
    function unsubscribe()
    {

	}
}