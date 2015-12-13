<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array(
                                     "id"=>"trujillo",
                                     "model"=>"Trujillo",
                                     "update"=>"divObserva",
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
    <button type="button" onclick="historialForm()" class="btn btn-default" data-toggle="modal" data-target="#popupNuevaAventura">Historial</button>
    <button id="saveData" onclick="historialForm()" type="submit" class="btn btn-info pull-right">
        Registrar
    </button>
    
</div>
<br/><br/><br/><br/>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divActionO')));?>
</div>
<div class="row-fluid">
<div id="divObserva">
    <?php
        e($this->element('show_notes', array('Observaciones' => $Observaciones)));
    ?>    
</div>
</div>