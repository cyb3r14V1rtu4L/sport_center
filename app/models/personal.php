<?php
class Personal extends AppModel
{
    var $name = "Personal";
    var $useTable = "personal";
    var $primaryKey = "personal_id";
    
    var $validate = array(
        'nombre' => array(
            'alphaNumeric' => array(
                'rule' => 'ruleName',
                'required' => true,
                'message' => 'Ingrese el nombre de la persona'
                ),
        ),
        
       'apellidos' => array(
            'alphaNumeric' => array(
                'rule' => 'ruleName',
                'required' => true,
                'message' => 'Ingrese apellido(s) de la persona'
                ),
        ),
        'fecha_nacimiento' => array(
                'rule' => 'date',
                'required' => true,
                'message' => 'Ingrese Fecha de Nacimiento'
        ),
    );
}
