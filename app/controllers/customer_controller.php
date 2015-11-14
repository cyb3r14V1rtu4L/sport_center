<?php
class CustomerController extends AppController {

	var $name = 'Customer';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array("Clientes","Categorias","DatosClientes","Paises","Estados","Ciudades");
    
    function add($action)
    {
        $title = "Alta Clientes";
        $this->set("title_for_layout",$title);
        $this->set("Categorias",$this->Categorias->find("list",array("fields"=>array("categoria_id","nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        
        $this->set("Paises",$this->Paises->find("list",array("fields"=>array("Code","Name"),"order"=>"Name")));
        $this->set("Estados",$this->Estados->find("list",array("fields"=>array("Name","Name"),
                                                  "conditions"=>array("Country"=>"MEX"),
                                                  "order" => "Name"
                                                              )
                                                 )
                  );
        $this->set("Ciudades",$this->Ciudades->find("list",array("fields"=>array("Name","Name"),
                                                    "conditions"=>array("Province"=>"Veracruz"),
                                                     "order" => "Name"
                                                              )
                                                 )
                  );
        
        $this->set("Generos",$Generos);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function validateVocal($string,$type)
    {
        switch($type)
        {
            case 'a':
                $chars = array('a','e','i','o','u');
                break;
            case 'b':
                $chars = array(
                               'b','c','d','f',
                               'g','h','j','k',
                               'l','m','n','p',
                               'q','r','s','t',
                               'v','w','x','y',
                               'z'
                              );
                break;
            case 'n':
                $chars = array(
                               '7','8','9',
                               '4','5','6',
                               '1','2','3',
                                   '0'
                              );
                break;
        }
        
        $c=0;
        foreach($chars as $findme)
        {
            $pos = strpos($string, $findme);
            if ($pos !== false)
            {
                $c++;
            }
        }
        return $c;
    }
        
    function addCustomer()
    {
        #print_r($this->data);exit();
        
        $fecha_hoy = date("Y-m-d");
        $anio_actual = date("Y");
        $save =true;
        $messages = array();
        $msg1 =''; $msg2=''; $msg3=''; $msg33='';$msg4='';$msg5='';$msg6='';
        
        $vocal_nombre =  $this->validateVocal(trim($this->data['Clientes']['nombre']),'a');
        $conso_nombre =  $this->validateVocal(trim($this->data['Clientes']['nombre']),'b');

        if($vocal_nombre == 0 || $conso_nombre == 0)
        {
           $msg5 = '<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>El Nombre del Cliente parece no tener coherencia.</strong><br/>
                    </div>';
           $save = false;
        }
        
        $vocal_apellido =  $this->validateVocal(trim($this->data['Clientes']['apellidos']),'a');
        $conso_apellido =  $this->validateVocal(trim($this->data['Clientes']['apellidos']),'b');
        if($vocal_apellido == 0 || $conso_apellido == 0)
        {
           $msg6 = '<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>El (los) Apellido(s) del Cliente parece(n) no tener coherencia.</strong><br/>
                    </div>';
           $save = false;
        }
        
        $fecha_sys = $this->data['Clientes']['fecha_nacimiento'];
        $fecha = split("-", $fecha_sys);
        
        $edad = $anio_actual - $fecha[0];
        
       
        if($fecha_hoy < $fecha_sys || $edad > 100)
        {
            $msg1 = '<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Ingrese una Fecha de Nacimiento válida</strong><br/>
              </div>';
            $save  = false;
        }
        
        $pais   = $this->data['DatosClientes']['pais_id'];
        $estado = $this->data['DatosClientes']['estado_id'];
        $ciudad = $this->data['DatosClientes']['ciudad_id'];
        
        if($pais =='' || $estado =='' || $ciudad =='')
        {
            $msg2 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Localidad incorrecta</strong><br/>
              </div>';
            $save = false;
        }
               
        $dir1 = $this->data['DatosClientes']['calle'];
        $dir2 = $this->data['DatosClientes']['numero'];
        $dir3 = $this->data['DatosClientes']['colonia'];
        $dir4 = $this->data['DatosClientes']['cpostal'];
        
        $dir1 = $this->validateVocal(trim($this->data['DatosClientes']['calle']),'a');
        $dir11= $this->validateVocal(trim($this->data['DatosClientes']['calle']),'b');
        
        $dir3 = $this->validateVocal(trim($this->data['DatosClientes']['colonia']),'a');
        $dir33= $this->validateVocal(trim($this->data['DatosClientes']['colonia']),'b');
        
        
        $dir22= $this->validateVocal(trim($this->data['DatosClientes']['colonia']),'n');
        
        
        if($dir1 == 0 || $dir11 == 0 || $dir2 == '' || $dir3 =='' || $dir4 =='')
        {
            $msg33 ='<div class="alert alert-info" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Debe ingresar todos los datos del apartado "Dirección" correctamente</strong><br/>
              </div>';
           
            $save = false;
        }
        
        if($dir2 == 0)
        {
            $msg3 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Debe existir un dígito en el campo No. Exterior</strong><br/>
              </div>';
           
            $save = false;
        }
        
        if(strlen($dir4) < 5)
        {
            $msg4 ='<div class="alert alert-warning" role="alert">
                <a class="close" data-dismiss="alert">×</a>
                <strong>El Código Postal debe ser de 5 caracteres</strong><br/>
              </div>';
           
            $save = false;
        }
       
        array_push($messages, $msg1, $msg5, $msg6, $msg2,$msg33, $msg3, $msg4);
        $this->Clientes->set($this->data['Clientes']);
        $this->DatosClientes->set($this->data['DatosClientes']);
        if($this->Clientes->validates() && $this->DatosClientes->validates())
        {
            if($save === true){
                if($this->Clientes->save($this->data['Clientes']))
                {
                    $LastIdCustomer = $this->Clientes->getLastInsertId();
                    $this->data['DatosClientes']['cliente_id'] = $LastIdCustomer;
                    if($this->DatosClientes->save($this->data['DatosClientes']))
                    {
                        e('<div class="alert alert-success" role="alert">
                                <a class="close" data-dismiss="alert">×</a>
                                <strong>Cliente Registrado</strong>
                              </div>');
                        e("<script>jQuery('#barr_customers').css('width','100%');</script>");
                        e('<script>document.getElementById("customers").reset();</script>');
                        e("<script>jQuery('#barr_customers').css('width','1%');</script>");
                        
                        e("<script>jQuery('#tb1').addClass('active');</script>");
                        e("<script>jQuery('#tb2').removeClass('active');</script>");
                        e("<script>jQuery('#grales').addClass('tab-pane active');</script>");
                        e("<script>jQuery('#direccion').addClass('tab-pane');</script>");

                    }
                }
                
            }else{
                foreach ($messages as $msgs)
                {
                    e($msgs);
                }
                e("<script>jQuery('#barr_customers').css('width','1%');</script>");
            }   
        }else{                
                $this->set('validationErrorsArray', $this->Clientes->invalidFields());
                e('<div class="alert alert-danger" role="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Ingresar datos requeridos</strong><br/>
                  </div>');
                
                $IvalidFieldes = $this->Clientes->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                
                
                $PB = count($IvalidFieldes);
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>'.$iF.'</strong><br/>
                      </div>');
                    e("<script>jQuery('#barr_customers').css('width','$PB%');</script>");
                }
                foreach ($messages as $msgs)
                {
                    e($msgs);
                }
                
                $this->set('validationErrorsArray', $this->DatosClientes->invalidFields());
                
                $IvalidFieldes = $this->DatosClientes->invalidFields();
                $IvalidFieldes = array_values($IvalidFieldes);
                
                
                $PB = count($IvalidFieldes);
                foreach($IvalidFieldes as $iF)
                {
                    e('<div class="alert alert-warning" role="alert">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>'.$iF.'</strong><br/>
                      </div>');
                    e("<script>jQuery('#barr_customers').css('width','$PB%');</script>");
                }
                
            }
                 
        
    }
    
    function search()
    {
        
	}
    
    function unsubscribe()
    {

	}
}