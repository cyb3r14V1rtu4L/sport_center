<?php
class Clientes extends AppModel
{
    var $name = "Clientes";
    var $useTable = "clientes";
    var $primaryKey = "cliente_id";
    
    var $belongsTo = array(
                        'Categorias' => array
                              (
                              'className'  => 'Categorias',
                              'foreignKey' => 'categoria_id',
                              ),
                        'StatusElemento' => array
                              (
                              'className'  => 'StatusElemento',
                              'foreignKey' => 'status_id',
                              )
                         );
    
    var $validate = array(
        'nombre' => array(
        'rule' => 'notEmpty',
        'message' => 'Nombre del Cliente.'
        ),
        
       'apellidos' => array(
            'rule' => 'notEmpty',
        'message' => 'Apellido(s) del Cliente.'
        ),
        'pais_id' => array(
            'rule' => 'notEmpty',
        'message' => 'Favor de ingresar un País.'
        ),
        'estado_id' => array(
            'rule' => 'notEmpty',
        'message' => 'Favor de ingresar un Estado.'
        ),
        'ciudad_id' => array(
            'rule' => 'notEmpty',
        'message' => 'Favor de ingresar una Ciudad.'
        ),

        'fecha_nacimiento' => array(
                'rule' => 'date',
                'required' => true,
                'message' => 'Ingrese Fecha de Nacimiento'
        ),
    );
}
