<?php
#pr($Clientes);
?>
<div id="divServices">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Resultados Búsqueda</div>
  <div class="panel-body">
    <p>Seleccionar el cliente deseado para aplicar el cobro del servicio</p>
  </div>
    <div class="table-responsive">
        <table id="menu_info"  class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr />
                  <th />Nombre
                  <th />Apellido(s)
                  <th colspan="2" style="text-align: center" />Categoria
                  <th />Status
            </thead>
            <tbody>
                <?php 
                foreach($Clientes as $cliente)
                {
                ?>
                <tr />
                  <td /><?php e($cliente['Clientes']['nombre']);?>
                  <td /><?php e($cliente['Clientes']['apellidos']);?>
                  <td align="center" /><?php e($cliente['Categorias']['nombre']);?>
                  <td align="center" />$<?php e($cliente['Categorias']['costo']);?>
                  <td  /><?php e($cliente['StatusElemento']['descripcion']);?>
                  <td align="center" /><?php e($ajax->link($html->image('services.png',array('title' => 'Aplicar Cobro Normal','alt' => 'Aplicar Cobro Normal','width'=>'18px','height'=>'18px')),
                                                      array( 'controller' => 'Services', 'action' => 'applyPayment', $cliente['Clientes']['cliente_id']),
                                                      array( 'update' => 'divServices', 'escape'=>false)));
                } //end foreach
                ?>
            </tbody>
        </table>
    </div>
  
</div>
</div>