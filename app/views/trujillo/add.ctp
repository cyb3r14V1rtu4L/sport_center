<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("id"=>"trujillo",
                                     "model"=>"Trujillo",
                                     "update"=>"divAction",
                                     "complete"=>"beforeSaveData('alert-warning')",
                                     "url"=>array("controller"=>"Trujillo",
                                                  "action"=>"addObservacion"),
                                    )
                   )
             )
 );

?>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divAction')));?>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php e($ACTION);?></h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="form-group col-sm-12 col-md-12">
            <div class="row">
            <div class="form-group col-sm-12 col-md-12">
                <?php 
                
                e($form->input('Trujillo.titulo',    
                                array('type'=>'text',
                                      'label'=>'Título',
                                      'class'=>'form-control',
                                      'autocomplete' => 'off',
                                     )));
                ?>
            </div>
        
            <div class="form-group col-sm-12 col-md-12">
                <?php e($form->input('Trujillo.observacion',    
                array('type'=>'textArea',
                      'label'=>'Observación',
                      'class'=>'form-control',
                      'autocomplete' => 'off',
                      )));
                ?>
            </div>
             
            </div>
        </div>
    </div>
  </div>   
</div>
<?php 
e($form->end());
?>
<div class="form-group">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#popupNuevaAventura">Historial</button>
    <button id="saveData" type="submit" class="btn btn-info pull-right">
        Registrar
    </button>
    
</div>
<br/><br/><br/><br/>

<!-- Modal Escenario-->
<div class="modal fade" id="popupNuevaAventura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">Oservaciones Registradas</h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
            <?php
                e($this->element('show_notes', array('Observaciones' => $Observaciones)));
            ?>    
      </div>
     
    </div>
  </div>
</div>