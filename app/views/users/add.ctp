<?php
echo '<h2>Nuevo Usuario</h2>';
echo $form->create('User');
?>
<table>
     <tr>
        <td>Usuario:</td>
        <td><?php echo $form->input('username',array("label"=>false)); ?></td>
    </tr>
     <tr>
        <td>Contraseña:</td>
        <td><?php echo $form->input('clear_password', array('type' => 'password', 'label' => 'Password',"label"=>false)); ?></td>
    </tr>
     <tr>
        <td>Repetir:</td>
        <td><?php echo $form->input('confirm_password', array('type' => 'password',"label"=>false));?></td>
    </tr>
    <tr>
        <td>Nombre:</td>
        <td><?php echo $form->input('first_name',array("label"=>false)); ?></td>
    </tr>
    <tr>
        <td>Apellido:</td>
        <td><?php echo $form->input('last_name',array("label"=>false)); ?></td>
    </tr>
    <tr>
        <td>Correo:</td>
        <td><?php echo $form->input('email',array("label"=>false)); ?></td>
    </tr>
    <tr>
        <td>Turno:</td>
        <td><?php echo $form->input('turno',array("label"=>false)); ?></td>
    </tr>
    <tr>
        <td>Estatus:</td>
        <td><?php echo $form->input('status', array("label"=>false,'options' => array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'))); ?></td>
    </tr>
    <!--<tr>
        <td>Área</td>
        <td><?php //echo $form->input('id_area', array("label"=>false,'options' => $areas,'empty'=>'Seleccionar')); ?></td>
    </tr>-->
   <!-- <tr>
        <td>Estado</td>
        <td><?php //echo $form->input('id_estado', array("label"=>false,'options' => array("30"=>"Veracruz"),'empty'=>'Seleccionar')); ?></td>
    </tr>-->
    <tr>
        <td colspan="2"><?php echo $form->submit('Agregar', array('after' => ' ' . $html->link('Cancel', array('action' => 'index'))));?></td>
    </tr>
    
</table>




<?php 

echo $form->end();
?>
