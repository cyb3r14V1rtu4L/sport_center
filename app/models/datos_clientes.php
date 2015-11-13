<?php
class DatosClientes extends AppModel
{
    var $name = "DatosClientes";
    var $useTable = "datos_clientes";
    var $primaryKey = "datos_id";
    
    var $validate = array(
        
       'correo' => array(
            'rule' => 'email',
        'message' => 'Debe ingresar un correo electónico válido.'
        )
    );
}
