<?php
class Grupos extends AppModel
{
    var $name = "Grupos";
    var $useTable = "grupos";
    var $primaryKey = "grupo_id";
    //var $recursive = 2;
    
    var $validate = array(
		'descripcion' => array
                        (
                            'rule'  => 'isUnique',
                            'required'=>true,
                            'message' => "Ingresar un Grupo Nuevo.",
                            'allowEmpty' => false
                        ),
        'fecha_inicio' => array
                        (
                            'rule' => 'date',
                            'allowEmpty' => false,
                            'message' => 'Ingrese una Fecha de Inicio del Grupo'
                        ),
        'fecha_termino' => array
                        (
                            'rule' => 'date',
                            'allowEmpty' => false,
                            'message' => 'Ingrese una Fecha de Térnimo del Grupo'
                        ),
    );
    /*
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