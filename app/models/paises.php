<?php
class Paises extends AppModel
{
    var $name = "Paises";
    var $useTable = "country";
    var $primaryKey = "Code";
    
    /*var $hasMany = array(
                        'Ciudades' => array
                              (
                              'className'  => 'Ciudades',
                              'foreignKey' => 'Paises_Codigo',
                              ),
                         );
    
    */
}
