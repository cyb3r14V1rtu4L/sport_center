<?php
date_default_timezone_set('America/Mexico_City');
?>

<head>
  <?php echo $this->Html->charset();?>
  <title><?php echo $title_for_layout?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
    <?php
        e($this->Html->css('bootstrap.min', 'stylesheet'));
        e($this->Html->css('style', 'stylesheet'));
        e($this->Html->css('jquery.datetimepicker'));
        e($this->Html->css('sticky.full'));
        e($this->Html->css('smoothness/jquery-ui-1.10.1.custom.css'));
        e($this->Html->css('smoothness/jquery.ui.combogrid.css'));
        
    ?>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->
  
  
	<?php
		/** NOTE @begin->devoops */
		$theme = 'devoops/';

		/** NOTE prototype **/
		e($this->Html->script($theme.'prototype/prototype'));
		e($this->Html->script($theme.'scriptaculous/scriptaculous.js?load=effects'));
		
        /** NOTE combogrid**/
       // e($this->Html->script($theme.'autocomplete/jquery/jquery-ui-1.10.1.custom.min.js'));
      //  e($this->Html->script($theme.'autocomplete/plugin/jquery.ui.combogrid-1.6.3.js'));
        
		/** @require*/
		e($this->Html->script($theme.'require/require'));
        
	?>
	<script>
	require.config({
		baseUrl: './',
		paths: {
			'jquery': "<?php e($this->webroot.'js/devoops/autocomplete/jquery/jquery-2.1.4');?>",
			'bootstrap': "<?php e($this->webroot.'js/devoops/bootstrap/bootstrap.min');?>",
            'scripts': "<?php e($this->webroot.'js/scripts');?>",
            'tooltip': "<?php e($this->webroot.'js/tooltip');?>",
            'datepicker': "<?php e($this->webroot.'js/jquery.datetimepicker');?>",
            'tab': "<?php e($this->webroot.'js/tab');?>",
            'Sticky': "<?php e($this->webroot.'js/sticky.full');?>",
            'masked': "<?php e($this->webroot.'js/jquery.maskedinput.min');?>"
		},
		shim: {
			'bootstrap': ['jquery']
		},
		map: {
			'*': {
				'jquery': 'jQueryNoConflict'
			},
			'jQueryNoConflict': {
				'jquery': 'jquery'
			}
		}
	});
	define('jQueryNoConflict', ['jquery'], function ($) {
		return $.noConflict();
	});
	if (Prototype.BrowserFeatures.ElementExtensions) {
		require(['jquery', 'bootstrap'], function ($) {
			// Fix incompatibilities between BootStrap and Prototype
			var disablePrototypeJS = function (method, pluginsToDisable) {
					var handler = function (event) {  
						event.target[method] = undefined;
						setTimeout(function () {
							delete event.target[method];
						}, 0);
					};
					pluginsToDisable.each(function (plugin) { 
						$(window).on(method + '.bs.' + plugin, handler); 
					});
				},
				pluginsToDisable = ['collapse', 'dropdown', 'modal', 'tooltip', 'popover', 'tab'];
			disablePrototypeJS('show', pluginsToDisable);
			disablePrototypeJS('hide', pluginsToDisable);
		});
	}
	</script>

	
    <?php
//         e($this->Html->script('jquery.min'));
//         e($this->Html->script('bootstrap.min'));
        e($this->Html->script('ajaxManual'));
        e($this->Html->script('ajaxValidations'));
        
    ?>
</head>

<body >
    <?php 
    $link = (isset($_SESSION['Auth']['User']['id'])) ? 'logout' : 'login' ;
    ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				
			</div>
		
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="#">
                      <?php
                      if(isset($_SESSION['Auth']['User']['id']))
                        {
                            e($html->image("squash_in.png",array('width'=>'28px','height'=>'28px','onclick'=>'window.location = "'.$this->webroot.'"')));
                        }else
                            {
                                e($html->image("squash_out.png",array('width'=>'28px','height'=>'28px','onclick'=>'window.location = "'.$this->webroot.'"')));
                            }
                        ?>
                  </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  
                    <ul class="nav navbar-nav">
					<?php
                        if(isset($_SESSION['Auth']['User']['id']))
                        {
                        ?>
                            <li><a href="<?php e($this->webroot.'menu/index/1')?>" class=""><?php e($html->image("add.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            <li><a href="<?php e($this->webroot.'menu/index/2')?>"><?php e($html->image("search.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            <li><a href="<?php e($this->webroot.'menu/index/3')?>"><?php e($html->image("delete.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            <li><a href="<?php e($this->webroot.'trujillo/add/1')?>"><?php e($html->image("obs.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            
                    <?php
                        }
                    ?>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(!isset($_SESSION['Auth']['User']['id']))
                        {
                        ?>
                      <li><a href="#" id="log_in_button"  data-toggle="tooltip" title="Iniciar Sesión"><?php e($html->image("login.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                        <?php
                        }else{
                            ?>
                            <li><a href="<?php e($this->webroot.'Users/'.$link)?>"  data-toggle="tooltip" title="Cerrar Sesión"><?php e($html->image("logout.png",array('width'=>'28px','height'=>'28px')));?></a></li>
                            <?php
                        }
                        ?>
                       
				  </ul>
				</div>
			  </div>
			</nav>
			<div class="clearfix"></div>
            <?php
                if(!isset($_SESSION['Auth']['User']['id']))
                {
			$arrIMG = array();
			$i = 0;
			while ($i != 1):
				$x = mt_rand(1,11);
				if(!in_array($x, $arrIMG)){
					array_push($arrIMG, $x);
				}
				if(count($arrIMG)==4)
				{
					$i=1;
				}
			endwhile;
                ?>
                    <?php $id_wall  = 'wall_'.$arrIMG[0].'.jpg';?> 
                    <div class="carousel slide" id="carousel-731019">
                        <ol class="carousel-indicators">
                          <li data-slide-to="0" data-target="#carousel-731019" class="active" ></li>
                          <li data-slide-to="1" data-target="#carousel-731019" class=""></li>
                          <li data-slide-to="2" data-target="#carousel-731019" class=""></li>
                          <li data-slide-to="3" data-target="#carousel-731019" class=""></li>
                        </ol>
                        <div class="carousel-inner" style="max-height:475px; overflow:hidden;">
                          <?php
			  $x=0;
                          foreach($arrIMG as $img)
                          {
                            $id_wall  = 'wall_'.$img.'.jpg';
                            $active = ($x==0) ? ' active ' : '' ;
                           ?>
                          <div class="item <?php e($active)?>" style="max-width: 100%; height: auto;">
                            <img alt="Centro Deportivo Insurgentes" src="<?php e($this->webroot."img/walls/$id_wall");?>">
                          </div>
                          <?php
				$x++;
                          }
                          ?>
                        </div>

                        <a class="left carousel-control" href="#carousel-731019" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-731019" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                      </div>
                    
                <?php
                }
            ?>
			<br/>
            <div class="row clearfix">
                <div class="col-md-12 column" >
					<?php echo $content_for_layout ?>
                    <?php e($this->Session->flash()); ?>
				</div>
			</div>
		</div>
	</div>
    
    <br/><br/><br/><br/><br/><br/>
    
</div>

<div class="row clearfix">
    
    <footer id="footer" class="navbar-fixed-bottom">
      <div class="container" role="contentinfo">
        <div class="row">
          <div class="col-sm-12">
          	
            
          </div>
        </div><!--/row-->

        <div class="row">
        	<div class="col-md-12">
              	<p class="text-right">
              	<a href="#" rel="nofollow">Sistema Integral del Centro Deportivo Insurgentes</a> SICDI
                </p>
          	</div>
            
        </div><!--/row-->
      </div>
    </footer>
    
</div>
    <div class="row-fluid">
        <?php //echo $this->element('sql_dump'); ?>
    </div>
</body>


<script>
require(['jquery', 'bootstrap','scripts','datepicker','Sticky','masked','jquery'], function($) { // <--- Aqui llamamos a la libreria junto con jquery y bootstrap
    $(document).ready(function () {
        $(function() {
            $('#log_in_button').click(function(){
                loginForm();
                return false;
            });
            
        });
    });
});
</script>
