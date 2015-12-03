<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Clientes Activos</div>
    <div class="panel-body">
      <p>Utilizar el "Switch" para asignar el Cliente al Grupo Seleccionado</p>
    </div>
      <div class="table-responsive">
          <table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                  <tr />
                    <th />Nombre
                    <th />Apellido(s)
                    <th />Categoría
                    <th style="text-align: center;"/>Asignar
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
                      if(count($cliente['Grupos'])>0){
                          $GruposCliente = $cliente['Grupos'];
                          foreach($GruposCliente as $g)
                          {
                              $g_c = $g['grupo_id'];
                              if($g_c == $g_s){
                                  $chk = ($g_c == $g_s) ? ' checked ' : '';
                              }
                          }
                      }
                      
                      ?>
                      <input type="checkbox" name="toggle-<?php e($cliente['Clientes']['cliente_id'])?>" 
                             class="sw" 
                             id="toggle-<?php e($cliente['Clientes']['cliente_id'])?>" 
                             <?php e($chk)?>
                      >
                      <label for="toggle-<?php e($cliente['Clientes']['cliente_id'])?>"><span></span></label>
                      <?php
                          e($ajax->observeField('toggle-'.$cliente['Clientes']['cliente_id'],
                                  array("url"=>array("controller"=>"Groups",
                                          "action"=>"updateCustomerGroups",
                                          $cliente['Clientes']['cliente_id']),
                                          "update" => "divList0"
                                      )
                          ));
                          $x++;
                          $chk = '';
                  } //end foreach
                  ?>
              </tbody>
          </table>
      </div>
  </div>