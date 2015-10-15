<?php
class TrujilloController extends AppController {

	var $name = 'Trujillo';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Trujillo");
    
    function add($action)
    {
        $title = "Observaciones";
        $this->set("title_for_layout",$title);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
        $this->showNotes();
        
	}
    
    function addObservacion()
    {
        $this->Trujillo->set($this->data['Trujillo']);
        if($this->Trujillo->validates()){
            if($this->Trujillo->save($this->data['Trujillo']))
            {
                
                    e('<div class="alert alert-success" role="alert">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Observación Registrada</strong>
                          </div>');
                    e('<script>'
                        . 'document.getElementById("trujillo").reset();'
                        . 'jQuery.sticky("The page has loaded");'
                        . '</script>');
                    
            }
        }else{
                $this->set('validationErrorsArray', $this->Trujillo->invalidFields());
                e('<div class="alert alert-warning" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Ingresar datos requeridos</strong><br/>
                              </div>');
                $IvalidFieldes = $this->Trujillo->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>'.$iF.'</strong><br/>
                              </div>');
                }
                
            }
    }
    
    function showNotes()
    {
        $this->set("Observaciones",  $this->Trujillo->find("all",array("conditions"=>array("Trujillo.status"=>"0"))));
        
    }
    
    function updateObservaciones()
    {
        $this->Trujillo->set($this->data['Trujillo']);
        //pr($this->data);
        if($this->Trujillo->saveAll())
        {
             e('<div class="alert alert-success" role="alert">
                            <a class="close" data-dismiss="alert">×</a>
                            <strong>Cometario(s) Agregado(s)</strong>
                          </div>');
             exit();
        }
    }
}