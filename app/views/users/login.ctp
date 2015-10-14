<?php
echo $form->create('User', array('action' => 'login','id'=>'form2','class'=>'form-horizontal','role'=>'form'));
?>
<section  id="log_in_panel" style="display: none;">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Iniciar Sesión</h3>
  </div>
  <div class="panel-body">
      <p>
        <div class="form-group" id="formLogin">
        <label class="col-sm-2 control-label">Usuario</label>
        <div class="col-sm-10">
            <?php echo $form->input('username',
                array("label"=>false,
                  "class"=>"form-control",
                    "id" => "username"

                 )
               );
            ?>
        </div>
    </div>
    </p>
    <p>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Clave</label>
        <div class="col-sm-10">
             <?php echo $form->input('password',
                array("label"=>false,
                      "class"=>"form-control",
                      "id" => "pass"
                     )
                     );
             ?>
        </div>
        </div>
    </p>
    <p>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-info">Entrar</button>
        </div>
      </div>
    </p>
  </div>
</div>
</section>
<?php echo $form->end();