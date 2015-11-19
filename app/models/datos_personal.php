<?php
class DatosPersonal extends AppModel
{
    var $name = "DatosPersonal";
    var $useTable = "datos_personal";
    var $primaryKey = "datos_id";
    
    var $validate = array(
        
       'correo' => array(
            'rule' => 'email',
        'message' => 'Debe ingresar un correo electónico válido.'
        )
    );
}
