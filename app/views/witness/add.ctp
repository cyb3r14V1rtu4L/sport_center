<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("model"=>"CobroServicios",
                                     "update"=>"divList",
                                     "url"=>array("controller"=>"Witness",
                                                  "action"=>"searchCustomer"),
                                    )
                   )
             )
 );

#pr($Clientes);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php e($ACTION);?></h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="form-group col-sm-12 col-md-12">
            <div class="input-group">
                <input name="data[Busqueda][palabra_clave]" type="text" class="form-control" placeholder="Nombre del Cliente, Apellidos, Folio" >
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Buscar</button>
                </span>
            </div>
        </div>
    </div>
  </div>   
</div>

<?php

e($form->end());
?>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divList0')));?>
</div>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divList')));?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Clientes Activos</div>
  <div class="panel-body">
    <p>Utilizar el "Switch" para asignar la Asistencia del Cliente</p>
  </div>
    <div class="table-responsive">
        <table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr />
                  <th />Nombre
                  <th />Apellido(s)
                  <th />Categoría
                  <th  align="center"/>Asistencia
            </thead>
            <tbody>
                <?php 
                $x=1;
                foreach($Clientes as $cliente)
                {
                ?>
                <tr />
                  <td /><?php e($cliente['Clientes']['nombre']);?>
                  <td /><?php e($cliente['Clientes']['apellidos']);?>
                  <td align="center" /><?php e($cliente['Categorias']['nombre']);?>
                  <td align="center" />
                  <input type="checkbox" name="toggle-<?php e($cliente['Clientes']['cliente_id'])?>" class="sw" id="toggle-<?php e($cliente['Clientes']['cliente_id'])?>">
                  <label for="toggle-<?php e($cliente['Clientes']['cliente_id'])?>"><span></span></label>
                <?php
                e($ajax->observeField('toggle-'.$cliente['Clientes']['cliente_id'],
                        array("url"=>array("controller"=>"Witness",
                                "action"=>"updateWitness",
                                $cliente['Clientes']['cliente_id']),
                                "update" => "divList0"
                            )
                ));
                $x++;
                } //end foreach
                ?>
            </tbody>
        </table>
    </div>
  
</div>
</div>