<?php
$id_wall  = 'wall_'.rand(1,11).'.jpg';
?>
<div class="jumbotron" contenteditable="true">
    <h1>SICDI</h1>
    <p>Sistema Integral del Centro Deportivo Insurgentes</p>
    <h2>Bienvenido, <?php e($_SESSION['Auth']['User']['full_name'])?></h2>
    
    <div class="container-fluid">
        <div class="row" >
             <center >
            <?php e($html->image("walls/$id_wall",array('class'=>'img-responsive img-thumbnail pull-right', 'width'=>'50%','height'=>'50%')));?>
             </center>
        </div>
    </div>
</div>