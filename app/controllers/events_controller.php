<?php
class EventsController extends AppController {

	var $name = 'Events';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Paises","Ciudades","Estados");
    
    function getPaises($id=NULL)
    {
        $this->set("Paises",$this->Paises->find("list",array("fields"=>array("Code","Name","order" => "Name"))));
	}
    
    function getEstados($id=NULL)
    {
        $id = $this->data['DatosClientes']['pais_id'];
        $this->set("Estados",$this->Estados->find("list",array("fields"=>array("Name","Name"),
                                                  "conditions"=>array("Country"=>$id),
                                                  "order" => "Name"
                                                              )
                                                 )
                  );
        
	}
    
    function getCiudades($id=NULL)
    {
        $id = $this->data['DatosClientes']['estado_id'];
        
        $this->set("Ciudades",$this->Ciudades->find("list",array("fields"=>array("Name","Name"),
                                                    "conditions"=>array("Province"=>$id),
                                                    "order" => "Name"
                                                              )
                                                   )
                  );     
        
	}
}