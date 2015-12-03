<?php
class WitnessController extends AppController {

	var $name = 'Witness';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Clientes","Categorias","DatosClientes","Asistencias");
    
    function add($action)
    {
        $title = "Asistencia de Clientes";
        $this->set("title_for_layout",$title);
        $this->set("Categorias",$this->Categorias->find("list",array("fields"=>array("categoria_id","nombre"))));
        $conditions = array("Clientes.status_id"=>1);
        $this->set("Clientes",$this->Clientes->find("all",array("conditions"=>$conditions,"order"=>array("Clientes.categoria_id","Clientes.nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        $this->set("Generos",$Generos);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function searchCustomer()
    {
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
    
    function updateWitness($id)
    {
        $this->data['Asistecias']['cliente_id'] = $id;
        $this->data['Asistecias']['fecha'] = date("Y-m-d");
        $a = $this->Asistencias->find("first",array("conditions"=>array("Asistencias.cliente_id"=>$id,"Asistencias.fecha" => date("Y-m-d"))));
        if(!$a){
            $this->Asistencias->set($this->data);
            if($this->Asistencias->save($this->data['Asistecias']))
            {
                
                e('<div class="alert alert-success" role="alert" id="msgAsistencia">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Asistencia Registrada</strong>
                      </div>');
               
            }
        }else{
            $this->Asistencias->delete($a['Asistencias']['asistencia_id']);
            e('<div class="alert alert-warning" role="alert" id="msgAsistencia">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Asistencia Removida</strong>
                      </div>');
            
        }
        e('<script>window.setTimeout(function() {
                jQuery("#msgAsistencia").fadeTo(500, 0).slideUp(500, function(){
                    jQuery(this).remove(); 
                });
                }, 400);</script>'
            );
        exit();
        
    }
    
    
	function search() {
        $this->add(1);
        $this->render("add");
	}
    
}