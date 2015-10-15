<?php
class PeopleController extends AppController {

	var $name = 'People';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array('Personal','Puestos','Puestos');
    
    function add($action,$personal)
    {
        $title = ($personal == '1') ? "Alta Personal" : "Alta Proveedores";
        $this->set("title_for_layout",$title);
        $this->set("Puestos",$this->Puestos->find("list",array("fields"=>array("puesto_id","nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        $this->set("Generos",$Generos);
        $this->set("personal",$personal);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
    }
    
    function addPeople()
    {
        
	}
}