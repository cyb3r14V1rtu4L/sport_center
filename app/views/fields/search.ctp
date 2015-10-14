<?php
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Espacios</h3>
  </div>
  <div class="panel-body">
    <div class="row">
        <?php 
        foreach($Fields as $field){
        ?>    
        <div class="col-sm-6 col-md-3">
          <a href="<?php e($this->webroot.'fields/'.$field['Espacios']['action'])?>" class="thumbnail"
              data-toggle="tooltip" title="<?php e($field['Espacios']['desc_espacio']);?>">
            <?php e($html->image($field['Espacios']['icono'],array('width'=>'64px','height'=>'64px')));?>
          </a>
        </div>
        <?php
        
        }
        ?>
    </div>
  </div>
</div>

