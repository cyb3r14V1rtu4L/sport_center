<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("id"=>"customers",
                                     "model"=>"Clientes",
                                     "update"=>"divAction",
                                     "complete"=>"beforeSaveData('alert-warning')",
                                     "url"=>array("controller"=>"Customer",
                                                  "action"=>"addCustomer"),
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
    <li role="presentation"><a href="#direccion" aria-controls="direccion" role="tab" data-toggle="tab" onclick="autoComplete();">Dirección</a></li>
    <li role="presentation"><a href="#contacto" aria-controls="profile" role="tab" data-toggle="tab">Contacto</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="grales">
        <p>
            <div class="row">
            <div class="form-group col-sm-12 col-md-6">
                <?php 
                e($form->input('Clientes.cliente_id',    
                array('type'=>'hidden','label'=>false)));
                e($form->input('Clientes.nombre',    
                                array('type'=>'text',
                                      'label'=>'Nombre',
                                      'class'=>'form-control',
                                      'autocomplete' => 'off',
                                      'onKeypress'=> 'return soloLetras(event);',
                                      'placeholder'=>'Nombre del Cliente',
                                     )));
                ?>
            </div>
        
            <div class="form-group col-sm-12 col-md-6">
                <?php e($form->input('Clientes.apellidos',    
                array('type'=>'text',
                      'label'=>'Apellidos Paterno | Materno',
                      'class'=>'form-control',
                      'autocomplete' => 'off',
                      'onKeypress'=> 'return soloLetras(event);',
                      'placeholder'=>'Apellidos del Cliente')));
                ?>
            </div>
             
            </div>
            <div class="row">
            <div class="form-group col-sm-6 col-md-3">
                <?php e($form->input('Clientes.fecha_nacimiento',    
                array('id'=>'fecha_nacimiento',
                      'type'=>'text',
                      'label'=>'Fecha de Nacimiento',
                      'class'=>'form-control',
                      'placeholder'=>'AAAA-MM-DD',
                      'autocomplete' => 'off',
                      'onkeypress'=>"mascara(this,'-',fechas,true);",
                      'onClick'=>'dateBurn(this.id,\'Y-m-d\');',
                      'onBlur'=>'dateBurn(this.id,\'Y-m-d\');',
                      'maxLength'=>10
                      )));
                ?>
            </div>
            <div class="col-sm-6 col-md-3">
                <?php e($form->input('Clientes.genero',array
                    ("id"=>"genero",
                    "label"=>"Género",
                    "type"=>"select",
                    "options"=>$Generos,
                    "class"=>"form-control",
                    "default"=>"M",
                    "empty"=>"Seleccionar")));
                ?>
            </div>   
        
            <div class="col-sm-6 col-md-3">
                <?php e($form->input('Clientes.categoria_id',array
                    ("id"=>"id_calle",
                    "label"=>"Categoría",
                    "type"=>"select",
                    "options"=>$Categorias,
                    "class"=>"form-control",
                    "empty"=>"Seleccionar")));
                ?>
            </div>
        </div>
        </p>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="direccion">
        <p>
        <div class="row">
        <div class="form-group col-sm-12 col-md-2">
        <?php 
        e($form->input('DatosClientes.pais_id',    
                array('id'=>'pais_id','type'=>'hidden','label'=>false, 'value'=>'MX')));
        e($form->input('DatosClientes.pais',    
        array('id'=>'pais',
          'type'=>'text',
          'label'=>'País<div style=" font-size:5px;" id="pais_code"></div>',
          'class'=>'form-control',
          'onfocus'=>'autoCompletePaises();',
          'onKeypress'=> 'return soloLetras(event);',
          'placeholder'=>'Ingrese un País',
          'value' => 'México'
        )));
        ?>
        </div>   
        <div class="form-group col-sm-12 col-md-2">
        <?php 
        e($form->input('DatosClientes.estado_id',   
                array('id'=>'estado_id','type'=>'hidden','label'=>false, 'value'=>'8236')));
        e($form->input('DatosClientes.estado',    
        array('id'=>'estado',
          'type'=>'text',
          'label'=>'Estado',
          'class'=>'form-control',
          'onfocus'=>'autoCompleteEstados();',
          'onKeypress'=> 'return soloLetras(event);',
          'placeholder'=>'Ingrese un Estado',
          'value'=>'Veracruz'
        )));
        ?>
        </div>   
        <div class="form-group col-sm-12 col-md-2">
        <?php 
        e($form->input('DatosClientes.ciudad_id',    
                array('id'=>'ciudad_id','type'=>'hidden','label'=>false,'value'=>'101285')));
        e($form->input('DatosClientes.ciudad',    
        array('id'=>'ciudad',
              'type'=>'text',
              'label'=>'Ciudad',
              'class'=>'form-control',
              'onfocus'=>'autoCompleteCiudades();',
              'onKeypress'=> 'return soloLetras(event);',
              'placeholder'=>'Ingrese una Ciudad',
              'value'=>'Xalapa'
            )));
        ?>
        <div id="switcher" style="float:right"></div>
        </div>
            
        </div>
        <div class="form-group">
        <?php e($form->input('DatosClientes.calle',    
        array('type'=>'text',
              'label'=>'Domicilio',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return soloLetras(event);',
              'placeholder'=>'Calle y número'
            )));
        ?>
        </div>
        <div class="form-group">
        <?php e($form->input('DatosClientes.colonia',    
        array('type'=>'text',
              'label'=>'Colonia',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'onKeypress'=> 'return soloLetras(event);',
              'placeholder'=>'Colonia'
            )));
        ?>
        </div>
        <div class="form-group">
        <?php e($form->input('DatosClientes.cpostal',    
        array('type'=>'text',
              'label'=>'Código Postal',
              'class'=>'form-control',
              'autocomplete' => 'off',
              'placeholder'=>'12345',
              'onKeypress'=> 'return soloNumeros(event);',
              'maxLength'=>5
            )));
        ?>
        </div>
        </p> 
      </div>
      <div role="tabpanel" class="tab-pane" id="contacto">
        <p>
        <div class="form-group">
            <?php 
            e($form->input('DatosClientes.datos_id',    
            array('type'=>'hidden','label'=>false)));
            e($form->input('DatosClientes.cliente_id',    
            array('type'=>'hidden','label'=>false)));
            e($form->input('DatosClientess.tel_fijo',    
            array('type'=>'text',
                  'label'=>'Teléfono Fijo',
                  'autocomplete' => 'off',
                  'class'=>'form-control',
                  //'onkeypress'=>'return valPhone(this);',
                  'onkeypress'=>"mascara(this,'-',telefono,true);",
                  'placeholder'=>'000-000-00000','maxLength'=>12)));
            ?>
        </div>
        <div class="form-group">
            <?php e($form->input('DatosClientes.tel_movil',    
            array('type'=>'text',
                  'label'=>'Teléfono Celular',
                  //'autocomplete' => 'off',
                  'class'=>'form-control',
                  'onfocus'=>'maskMovil(this.id);',
                  'onkeypress'=>"mascara(this,'-',telefono,true);",
                  'placeholder'=>'000-000-00000','maxLength'=>12)));
            ?>
        </div>
        <div class="form-group">
            <?php e($form->input('DatosClientes.correo',    
            array('type'=>'text',
                  'label'=>'Correo Electrónico',
                  'class'=>'form-control',
                  'autocomplete' => 'off',
                  'placeholder'=>'correo@proveedor.org')));
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