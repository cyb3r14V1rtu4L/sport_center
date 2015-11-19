<?php
class Personal extends AppModel
{
    var $name = "Personal";
    var $useTable = "personal";
    var $primaryKey = "personal_id";
    
   /* var $belongsTo = array(
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
    
    */
    
    
    var $validate = array(
        'nombre' => array(
            'rule' => array('minLength', '2'),
            'message' => 'El nombre del personal debe contener almenos dos caracteres'
        ),
        
       'apellidos' => array(
            'rule' => array('minLength', '2'),
            'message' => 'El apellido del personal debe contener almenos dos caracteres'
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
                'message' => 'Ingrese una Fecha de Nacimiento válida'
        ),
    );
}
