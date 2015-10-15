<?php
class Categorias extends AppModel
{
    var $name = "Categorias";
    var $useTable = "categoria_clientes";
    var $primaryKey = "categoria_id";
    //var $recursive = 2;
    
    /*var $validate = array(
		'calle' => array
                        (
                        'requerido'=>array(
                            'rule'  => 'notEmpty',
                            'required'=>true,
                            'message' => "Este campo es obligatorio. Favor de ingresarlo."
                            ),
                        ),);
    
    var $belongsTo = array(
                          'Colonia' => array
                                (
                                'className'  => 'Colonia',
                                'foreignKey' => 'id_colonia',
                                'associationForeignKey'=>'id_colonia',
                                'with' => 'Colonia',
                                )
                           );
     * 
     */
}