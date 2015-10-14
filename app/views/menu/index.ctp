<?php

?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php e($title);?></h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'customer/'.$action.'/'.$ACTION)?>" class="thumbnail"
              data-toggle="tooltip" title="Cliente">
            <?php e($html->image("customer.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'people/'.$action.'/'.$ACTION.'/1')?>" class="thumbnail"
             data-toggle="tooltip" title="Empleado">
            <?php e($html->image("employee.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'people/'.$action.'/'.$ACTION.'/2')?>" class="thumbnail"
             data-toggle="tooltip" title="Proveedor">
            <?php e($html->image("provider.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'services/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Cobro Servicios">
            <?php e($html->image("services.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'witness/'.$action.'/'.$ACTION)?>" class="thumbnail"
              data-toggle="tooltip" title="Asistencia">
            <?php e($html->image("witness.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'groups/'.$action.'/'.$ACTION)?>" class="thumbnail"
              data-toggle="tooltip" title="Grupo">
            <?php e($html->image("groups.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'fields/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Espacios">
            <?php e($html->image("fields.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div> 
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'products/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Productos">
            <?php e($html->image("products.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'purchase/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Compras">
            <?php e($html->image("purchases.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'sales/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Ventas">
            <?php e($html->image("sales.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'promotions/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Promociones">
            <?php e($html->image("promotions.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'reports/'.$action.'/'.$ACTION)?>" class="thumbnail"
             data-toggle="tooltip" title="Reportes">
            <?php e($html->image("reports.png",array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
    </div>
  </div>
</div>
<script>
$('a').tooltip();
</script>
