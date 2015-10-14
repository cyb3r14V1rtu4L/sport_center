<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("model"=>"Personal",
                                     "update"=>"divAction",
                                     "complete"=>"beforeSaveData('alert-warning')",
                                     "url"=>array("controller"=>"People",
                                                  "action"=>"addPeople"),
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
    

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#grales" aria-controls="home" role="tab" data-toggle="tab">Generales</a></li>
    <li role="presentation"><a href="#contacto" aria-controls="profile" role="tab" data-toggle="tab">Contacto</a></li>
    <li role="presentation"><a href="#direccion" aria-controls="direccion" role="tab" data-toggle="tab">Dirección</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="grales">
        <p>
            <div class="row">
            <div class="form-group col-sm-12 col-md-6">
                <?php 
                e($form->input('Personal.personal_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('Personal.tipo',    
                array('type'=>'hidden','label'=>false,'value'=>$personal)));
                e($form->input('Personal.nombre',    
                                array('type'=>'text',
                                      'label'=>'Nombre',
                                      'class'=>'form-control',
                                      'autocomplete' => 'off',
                                      'placeholder'=>'Nombre',
                                      'error' => array('notempty' => __('This field cannot be empty', true))
                                     )));
                ?>
            </div>
        
            <div class="form-group col-sm-12 col-md-6">
                <?php e($form->input('Personal.apellidos',    
                array('type'=>'text',
                      'label'=>'Apellidos Paterno | Materno',
                      'class'=>'form-control',
                      'autocomplete' => 'off',
                      'placeholder'=>'Apellido(s)')));
                ?>
            </div>
             
            </div>
            <div class="row">
            <div class="form-group col-sm-6 col-md-3">
                <?php e($form->input('Personal.fecha_nacimiento',    
                array('id'=>'fecha_nacimiento',
                      'type'=>'text',
                      'label'=>'Fecha de Nacimiento',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'onClick'=>'dateBurn(this.id,\'Y-m-d\');',
                      )));
                ?>
            </div>
            <div class="col-sm-6 col-md-3">
                <?php e($form->input('Personal.genero',array
                    ("id"=>"genero",
                    "label"=>"Género",
                    "type"=>"select",
                    "options"=>$Generos,
                    "class"=>"form-control",
                    "empty"=>"Seleccionar")));
                ?>
            </div>   
        
            <div class="col-sm-6 col-md-3">
                <?php e($form->input('Personal.puesto_id',array
                    ("id"=>"id_calle",
                    "label"=>"Puesto",
                    "type"=>"select",
                    "options"=>$Puestos,
                    "class"=>"form-control",
                    "empty"=>"Seleccionar")));
                ?>
            </div>
        </div>
        </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="contacto">
        <p>
        <div class="form-group">
            <?php 
            e($form->input('DatosPersonal.datos_id',    
            array('type'=>'hidden','label'=>false)));
            e($form->input('DatosPersonal.cliente_id',    
            array('type'=>'hidden','label'=>false)));
            e($form->input('DatosPersonal.tel_fijo',    
            array('type'=>'text',
                  'label'=>'Teléfono Fijo',
                  'autocomplete' => 'off',
                  'class'=>'form-control',
                  'placeholder'=>'(000)-000000000')));
            ?>
        </div>
        <div class="form-group">
            <?php e($form->input('DatosPersonal.tel_movil',    
            array('type'=>'text',
                  'label'=>'Teléfono Celular',
                  'autocomplete' => 'off',
                  'class'=>'form-control',
                  'placeholder'=>'(000)-000000000')));
            ?>
        </div>
        <div class="form-group">
            <?php e($form->input('DatosPersonal.correo',    
            array('type'=>'text',
                  'label'=>'Correo Electrónico',
                  'class'=>'form-control',
                  'autocomplete' => 'off',
                  'placeholder'=>'correo@proveedor.org')));
            ?>
        </div>
        </p>
    </div>
    <div role="tabpanel" class="tab-pane" id="direccion">
        <p>
        <div class="form-group">
        <?php e($form->input('DatosPersonal.calle',    
        array('type'=>'text',
              'label'=>'Domicilio',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'placeholder'=>'Calle y número'
            )));
        ?>
        </div>
        <div class="form-group">
        <?php e($form->input('DatosPersonal.colonia',    
        array('type'=>'text',
              'label'=>'Colonia',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'placeholder'=>'Colonia'
            )));
        ?>
        </div>
        <div class="form-group">
        <?php e($form->input('DatosPersonal.cpostal',    
        array('type'=>'text',
              'label'=>'Código Postal',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'placeholder'=>'12345',
              'maxLength'=>5
            )));
        ?>
        </div>
        </p> 
      </div>
  </div>
  
</div>   
</div>
<div class="form-group">
    <button id="saveData" type="submit" class="btn btn-info pull-right">
        Registrar
    </button>
</div>
<?php 
e($form->end());

?>
<script>

</script>