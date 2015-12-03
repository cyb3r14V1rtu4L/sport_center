<?php
class FieldsController extends AppController {

	var $name = 'Fields';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Espacios");
    
    function add($action){
        $this->set("ACTION","Alta Espacios");
        $this->search();
        $this->render("search");
	}
    
    function search() {
        //pr($this->Espacios->find("all",array("conditions"=>array("Espacios.status"=>true))));
        $this->set("Fields",$this->Espacios->find("all",array("conditions"=>array("Espacios.status_id"=>true))));
	}
    
    function squash() {

	}
    
    function fitness() {

	}
    
    function gym() {

	}
    
    function spinning() {

	}
    
    function spa() {

	}
    
    function competitions() {

	}
}   
