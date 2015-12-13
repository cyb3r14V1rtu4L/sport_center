<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("id"=>"observaciones",
                                     "model"=>"Trujillo",
                                     "update"=>"divActionO",
                                     "complete"=>"beforeSaveData('alert-warning')",
                                     "url"=>array("controller"=>"Trujillo",
                                                  "action"=>"updateObservaciones"),
                                    )
                   )
             )
 );
?>

<?php 
$x=0;
$panel = ' ';
foreach($Observaciones as $observacion)
{
    $panel = ($panel == ' panel-info ') ? ' ' : ' panel-info ';
?>
<div class="panel panel-default <?php e($panel);?>">
  <div class="panel-heading">
    <h3 class="panel-title">
        <?php 
        e($form->input('Trujillo.'.$x.'.observacion_id',    
            array('type'=>'hidden','label'=>false,'value'=>$observacion['Trujillo']['observacion_id'])));
        e($observacion['Trujillo']['titulo'].' - '.$observacion['Trujillo']['fecha']);
        ?>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row ">
        <div class="form-group col-sm-12 col-md-12">
            <?php 
                e($form->input('Trujillo.'.$x.'.observacion',    
                                array('type'=>'textArea',
                                      'label'=>'Observación',
                                      'class'=>'form-control',
                                      'rows'=>'3',
                                      'value'=>$observacion['Trujillo']['observacion']
                                     )));
                ?>
        </div>
        <div class="form-group col-sm-12 col-md-12">
            <?php
                e($form->input('Trujillo.'.$x.'.comentario',    
                                array('type'=>'textArea',
                                      'label'=>'Comentario',
                                      'class'=>'form-control',
                                      'rows'=>'3',
                                      'value'=>$observacion['Trujillo']['comentario']
                                     )));
                        ?>
        </div>
        <div class="form-group col-sm-12 col-md-12">
            <div class="form-group">
                <button id="saveData" type="submit" class="btn btn-info pull-right">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
  </div>   
</div>
<?php
    $x++;
} //end foreach

e($form->end());
?>