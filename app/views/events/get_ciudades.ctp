<?php
e($form->input('DatosClientes.ciudad_id',array
                    ("id"=>"ciudad_id",
                    "label"=>"Ciudad",
                    "type"=>"select",
                    "options"=>$Ciudades,
                    "class"=>"form-control",
                    "empty"=>"Seleccionar"
                    )));
?>