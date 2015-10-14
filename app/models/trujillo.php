<?php
class Trujillo extends AppModel
{
    var $name = "Trujillo";
    var $useTable = "observaciones";
    var $primaryKey = "observacion_id";
    
    
    
    var $validate = array(
        'titulo' => array(
        'rule' => 'notEmpty',
        'message' => 'Título de la Observación.'
        ),
        
        'observacion' => array(
        'rule' => 'notEmpty',
        'message' => 'Observación Requerida.'
        ),
        
    );
}
