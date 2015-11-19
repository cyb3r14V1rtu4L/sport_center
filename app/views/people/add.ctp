<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("id"=>"customers",
                                     "model"=>"Personal",
                                     "update"=>"divAction",
                                     //"complete"=>"beforeSaveData('alert-warning')",
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
    <?php e($form->input('porciento',array('type'=>'hidden','label'=>false,'id'=>'porciento','value'=>'7')));?>
    <div class="progress">
        <div id='barr_customers' class="progress-bar progress-bar-success" style="width: 1%">
            <span class="sr-only"></span>
        </div>
    </div>  

  <!-- Nav tabs -->
  <ul class="nav nav-pills nav-stacked" role="tablist">
    <li role="presentation" class="active" id="tb1"><a href="#grales" aria-controls="home" role="tab" data-toggle="tab">Generales</a></li>
    <li role="presentation" id="tb2"><a href="#direccion" aria-controls="direccion" role="tab" data-toggle="tab">Dirección</a></li>
  </ul>
  
  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="grales" >
        <p>
            <div class="row">
            <div class="form-group col-sm-12 col-md-6">
                <?php 
                 e($form->input('Personal.personal_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('Personal.tipo',    
                array('type'=>'hidden','label'=>false,'value'=>'2')));
                e($form->input('Personal.nombre',    
                                array('type'=>'text',
                                      'label'=>'Nombre',
                                      'class'=>'form-control',
                                      'autocomplete' => 'off',
                                      'onKeypress'=> 'return soloLetras(event);',
                                      'placeholder'=>'Nombre del Personal',
                                      //'onblur'=>"animatePB('barr_customers',7)"
                                     )));
                ?>
            </div>
        
            <div class="form-group col-sm-12 col-md-6">
                <?php e($form->input('Personal.apellidos',    
                array('type'=>'text',
                      'label'=>'Apellidos Paterno | Materno',
                      'class'=>'form-control',
                      'autocomplete' => 'off',
                      'onKeypress'=> 'return soloLetras(event);',
                      'placeholder'=>'Apellidos del Personal',
                      //'onblur'=>"animatePB('barr_customers',7)"
                    )));
                ?>
            </div>
             
            </div>
            <div class="row">
            <div class="form-group col-sm-12 col-md-4">
                <?php e($form->input('Personal.fecha_nacimiento',    
                array('id'=>'fecha_nacimiento',
                      'type'=>'text',
                      'label'=>'Fecha de Nacimiento',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'onkeypress'=>"mascara(this,'-',fechas,true);",
                      'onClick'=>'dateBurn(this.id,\'Y-m-d\');',
                      'onBlur'=>'dateBurn(this.id,\'Y-m-d\');',
                      'maxLength'=>10,
                      //'onblur'=>"animatePB('barr_customers',7)"
                      )));
                ?>
            </div>
            <div class="form-groupcol-sm-12 col-md-4">
                <?php e($form->input('Personal.genero',array
                    ("id"=>"genero",
                    "label"=>"Género",
                    "type"=>"select",
                    "options"=>$Generos,
                    "class"=>"form-control",
                    "default"=>"M",
                    //"onchange"=>"animatePB('barr_customers',7)",
                    "empty"=>"Seleccionar")));
                ?>
            </div>   
        
            <div class="form-group col-sm-12 col-md-4">
                <?php e($form->input('Personal.puesto_id',array
                    ("id"=>"id_puesto",
                    "label"=>"Puesto",
                    "type"=>"select",
                    "options"=>$Puestos,
                    "class"=>"form-control",
                    "default"=>3,
                    //"onchange"=>"animatePB('barr_customers',7)",
                    "empty"=>"Seleccionar")));
                ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-md-4">
                <?php 
                e($form->input('DatosPersonal.datos_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('DatosPersonal.personal_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('DatosPersonal.tel_fijo',    
                array('type'=>'text',
                      'label'=>'Teléfono Fijo',
                      'autocomplete' => 'off',
                      'class'=>'form-control',
                      //'onblur'=>"animatePB('barr_customers',7)",
                      'onkeypress'=>"mascara(this,'-',telefono,true);",
                      'placeholder'=>'000-000-00000','maxLength'=>12)));
                ?>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <?php e($form->input('DatosPersonal.tel_movil',    
                array('type'=>'text',
                      'label'=>'Teléfono Celular',
                      'autocomplete' => 'off',
                      'class'=>'form-control',
                      'onfocus'=>'maskMovil(this.id);',
                      //'onblur'=>"animatePB('barr_customers',7)",
                      'onkeypress'=>"mascara(this,'-',telefono,true);",
                      'placeholder'=>'000-000-00000','maxLength'=>12)));
                ?>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <?php e($form->input('DatosPersonal.correo',    
                array('type'=>'text',
                      'label'=>'Correo Electrónico',
                      'class'=>'form-control',
                      'autocomplete' => 'off',
                      //'onblur'=>"animatePB('barr_customers',7)",
                      'placeholder'=>'correo@proveedor.org')));
                ?>
            </div>
        </div>
        </p>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="direccion">
        <p>
        <div class="row">   
        <div class="form-group col-sm-12 col-md-4">
        <?php 
        
        e($form->input('DatosPersonal.pais_id',array
                    ("id"=>"pais_id",
                    "label"=>'País',
                    "type"=>"select",
                    "options"=>$Paises,
                    "class"=>"form-control",
                    "default"=>"MEX",
                    "empty"=>"Seleccionar",
                    //"onchange"=>"animatePB('barr_customers',7)"
                    )));
        ?>
        </div>   
        <div class="form-group col-sm-12 col-md-4">
            <div id ="divEstados">
            <?php 
            e($form->input('DatosPersonal.estado_id',array
                    ("id"=>"estado_id",
                    "label"=>'Estado',
                    "type"=>"select",
                    "options"=>$Estados,
                    "class"=>"form-control",
                    "default"=>"Veracruz",
                    "empty"=>"Seleccionar",
                    //"onchange"=>"animatePB('barr_customers',7)"
                    )));
            ?>
            </div>
        </div>   
        <div class="form-group col-sm-12 col-md-4">
            <div id ="divCiudades">
                <?php 
                e($form->input('DatosPersonal.ciudad_id',array
                        ("id"=>"ciudad_id",
                        "label"=>'Ciudad',
                        "type"=>"select",
                        "options"=>$Ciudades,
                        "class"=>"form-control",
                        "default"=>"Xalapa Enriquez",
                        "empty"=>"Seleccionar",
                        //"onchange"=>"animatePB('barr_customers',7)"
                        )));
                ?>
            </div>
        </div>
         
        </div>
        <div class="row">
        <div class="form-group col-sm-12 col-md-9">
        <?php e($form->input('DatosPersonal.calle',    
        array('type'=>'text',
              'label'=>'Domicilio',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return alphaNumeric(event);',
              'placeholder'=>'Nombre completo de la calle',
              //"onblur"=>"animatePB('barr_customers',7)"
            
            )));
        ?>
        </div>
        <div class="form-group col-sm-12 col-md-3">
        <?php e($form->input('DatosPersonal.numero',    
        array('type'=>'text',
              'label'=>'No. Exterior',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return alphaNumeric(event);',
              'maxLength'=>10,
              //"onblur"=>"animatePB('barr_customers',7)"
            )));
        ?>
        </div>
        <div class="form-group  col-sm-12 col-md-9">
        <?php e($form->input('DatosPersonal.colonia',    
        array('type'=>'text',
              'label'=>'Colonia',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return alphaNumeric(event);',
              'placeholder'=>'Colonia',
              //"onblur"=>"animatePB('barr_customers',7)"
            )));
        ?>
        </div>
        <div class="form-group col-sm-12 col-md-3">
        <?php e($form->input('DatosPersonal.cpostal',    
        array(
              'id' => 'cpostal',
              'type'=>'text',
              'label'=>'Código Postal',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return soloNumeros(event);',
              'maxLength'=>5,
              //"onblur"=>"animatePB('barr_customers',7)"
            )));
        ?>
        </div>
        </div>
        
        </p> 
      </div>
      
</div>
  
</div>   
</div>
<div class="form-group">
    <button id="saveData" type="submit" onclick="animatePB('barr_customers',100)" class="btn btn-info pull-right">
        Registrar
    </button>
</div>
<?php 

e($form->end());
e($ajax->observeField('pais_id',
    array("url"=>array("controller"=>"Events",
                       "action"=>"getEstados"
                       ),
          "update" => "divEstados"
         )
));