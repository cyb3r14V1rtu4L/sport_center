<?php
class MenuController extends AppController {

	var $name = 'Menu';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Clientes");
    
    function index($act = 'index') {
        $_SESSION['refresh']='';
        switch ($act)
        {
            case 1:
                $action = 'add';
                $title  = 'Nuevo';
                break;
            case 2:
                $action = 'search';
                $title  = 'Buscar...';
                break;
            case 3:
                $action = 'unsubscribe';
                $title  = 'Bajas';
                break;
        }
        $this->set("title_for_layout",$title);
        $this->set("action",$action);
        $this->set("title",$title);
        $this->set("ACTION",$act);
	}
}