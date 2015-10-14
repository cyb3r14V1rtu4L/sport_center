<?php
e($ajax->form(array("type"=>"post",                  
                    "options"=>array("model"=>"CobroServicios",
                                     "update"=>"divAction",
                                     "complete"=>"beforeSaveData('alert-warning')",
                                     "url"=>array("controller"=>"Services",
                                                  "action"=>"searchCustomer"),
                                    )
                   )
             )
 );
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cobro de Servicio</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <?php
        e($form->input('Clientes.cliente_id',    
                array('type'=>'text','label'=>false)));
        ?>
    </div>
  </div>   
</div>

<?php 
e($form->end());
?>
<div class="row-fluid">
    <?php e($html->div('', null, array('id' => 'divAction')));?>
</div>