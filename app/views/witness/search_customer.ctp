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
                      <th style="text-align: center;"/>Asistencia
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
                        <?php
                        $chk = ''; $f_c='';
                        $f_h = date('Y-m-d');
                        $Asistencias = $cliente['Asistencias'];
                        foreach($Asistencias as $a)
                        {
                            $f_a = $a['fecha'];
                            $f_c = (strtotime($f_h) === strtotime($f_a)) ? $f_a :'';
                        }
                        $chk = ($f_c != '') ? ' checked ' : '';
                        ?>
                        <input type="checkbox" name="toggle-<?php e($cliente['Clientes']['cliente_id'])?>" 
                               class="sw" 
                               id="toggle-<?php e($cliente['Clientes']['cliente_id'])?>" 
                               <?php e($chk)?>
                        >
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