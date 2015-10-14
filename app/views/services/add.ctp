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
    <?php e($html->div('', null, array('id' => 'divAction')));?>
</div>