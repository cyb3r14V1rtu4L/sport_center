<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("id"=>"groups",
                                     "model"=>"Grupos",
                                     "update"=>"divGroup",
                                     "url"=>array("controller"=>"Groups",
                                                  "action"=>"addGroups"),
                                    )
                   )
             )
 );

#pr($Clientes);
?>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divGroup')));?>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php e($ACTION);?></h3>
  </div>
  <div class="panel-body">
    <?php e($form->input('porciento',array('type'=>'hidden','label'=>false,'id'=>'porciento','value'=>'7')));?>
    <div class="progress">
        <div id='barr_groups' class="progress-bar progress-bar-success" style="width: 1%">
            <span class="sr-only"></span>
        </div>
    </div>  
    <div class="row">
        <div class="form-group col-sm-12 col-md-12">
           <div class="form-group col-sm-12 col-md-6">
                <?php 
                e($form->input('Grupos.grupo_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('Grupos.status',    
                array('type'=>'hidden','label'=>false,'value'=>'1')));
                e($form->input('Grupos.descripcion',    
                                array('type'=>'text',
                                      'label'=>'Nombre del Grupo',
                                      'class'=>'form-control',
                                      'autocomplete' => 'off',
                                      'onKeypress'=> 'return alphaNumeric(event);',
                                      'placeholder'=>'Descripción corta del Grupo',
                                     )));
                ?>
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <?php e($form->input('Grupos.fecha_inicio',    
                array('id'=>'fecha_inicio',
                      'type'=>'text',
                      'label'=>'Fecha de Inicio',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'onkeypress'=>"mascara(this,'-',fechas,true);",
                      'onClick'=>'dateGroups(this.id,\'Y-m-d\');',
                      'onBlur'=>'dateGroups(this.id,\'Y-m-d\');',
                      'maxLength'=>10,
                      )));
                ?>
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <?php e($form->input('Grupos.fecha_termino',    
                array('id'=>'fecha_termino',
                      'type'=>'text',
                      'label'=>'Fecha de Término',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'onkeypress'=>"mascara(this,'-',fechas,true);",
                      'onClick'=>'dateGroups(this.id,\'Y-m-d\');',
                      'onBlur'=>'dateGroups(this.id,\'Y-m-d\');',
                      'maxLength'=>10,
                      )));
                ?>
            </div>
        </div>
    </div>
            <hr>

    <div class="row-fluid">
        <div class="form-group">
            <button id="saveData" type="submit" onclick="animatePB('barr_customers',100)" class="btn btn-info pull-right">
                Registrar
            </button>
        </div>
        <div class="form-group">
            <a href="<?php e($this->webroot.'groups/customersGroups')?>">
            <button type="button" class="form-group btn btn-info  pull-right" style="margin-right: 15px;" >
            Editar Grupos <span class="glyphicon glyphicon-edit"></span>
            </button>
            </a>
        </div>
    </div>
  </div>   
</div>
<?php
e($form->end());