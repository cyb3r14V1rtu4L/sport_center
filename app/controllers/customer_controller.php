<?php
class CustomerController extends AppController {

	var $name = 'Customer';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Clientes","Categorias","DatosClientes");
    
    function add($action)
    {
        $title = "Alta Clientes";
        $this->set("title_for_layout",$title);
        $this->set("Categorias",$this->Categorias->find("list",array("fields"=>array("categoria_id","nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        $this->set("Generos",$Generos);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function addCustomer()
    {
        #print_r($this->data);
        $fecha_hoy = date("Y-m-d");
        $save =false;
        $fecha_sys = $this->data['Clientes']['fecha_nacimiento'];
        $save = ($fecha_sys < $fecha_hoy ) ? true : false ;
        if($save === true){
        $this->Clientes->set($this->data['Clientes']);
        if($this->Clientes->validates()){
            
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
                    e('<script>document.getElementById("customers").reset();</script>');
                }
            }
            
            }else{
                $this->set('validationErrorsArray', $this->Clientes->invalidFields());
                e('<div class="alert alert-warning" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Ingresar datos requeridos</strong><br/>
                              </div>');
                $IvalidFieldes = $this->Clientes->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>'.$iF.'</strong><br/>
                              </div>');
                }
                
            }
        }else{
            e('<div class="alert alert-warning" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Fecha incorrecta</strong><br/>
                              </div>');
        }
    }
    
    function search()
    {
        
	}
    
    function unsubscribe()
    {

	}
}