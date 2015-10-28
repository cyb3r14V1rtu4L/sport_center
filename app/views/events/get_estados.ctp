<?php

e($form->input('DatosClientes.estado_id',array
                    ("id"=>"estado_id",
                    "label"=>"Estado",
                    "type"=>"select",
                    "options"=>$Estados,
                    "class"=>"form-control",
                    "empty"=>"Seleccionar",
                    )));

e($ajax->observeField('estado_id',
    array("url"=>array("controller"=>"Events",
                       "action"=>"getCiudades"
                       ),
          "update" => "divCiudades"
         )
));
?>