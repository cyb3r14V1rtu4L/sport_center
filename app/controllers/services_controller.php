<?php
class ServicesController extends AppController {

	var $name = 'Services';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html', 'Form', 'Ajax', 'JavaScript', 'Js');
    var $uses = array('Clientes','Categorias','StatusElemento','Promociones');
    
    function add() {
        $title = "Cobro Servicio";
        $this->set("title_for_layout",$title);
        $this->set("Categorias",$this->Categorias->find("list",array("fields"=>array("categoria_id","nombre"))));
        $Generos = array(""=>"","F"=>"F","M"=>"M");
        $this->set("Generos",$Generos);
        $this->set("personal",$personal);
        $this->set("ACTION",$title);
        $this->set("BUTTON","Registrar");
	}
    
    function searchCustomer()
    {
        $palabra = $this->data['Busqueda']['palabra_clave'];
        
        if($palabra !=='')
        {
           $OR = array("Clientes.nombre LIKE","Clientes.apellidos LIKE","Clientes.folio  LIKE");
           $palabra = explode(" ",$palabra);
           $o_r = '';
           $x=0;
            foreach($OR as $or)
            {
                foreach($palabra as $p)
                {
                    $o_r .= $or." '%$p%' OR ";
                }
            }
            $o_r = rtrim($o_r,"OR ");
            $o_r = explode("OR",$o_r);
            $conditions['OR'] = $o_r; 
            $this->set("Clientes",$this->Clientes->find("all",array("conditions"=>$conditions)));

        }else{
             e('<div class="alert alert-warning" role="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>Ingrese una palabra clave</strong>
                </div>');
             exit();
        }
    }
    
    function applyPayment($cliente_id)
    {
        //e($cliente_id);
        $this->Clientes->id = $cliente_id;
        $Cliente = $this->Clientes->read();
        $this->set('Promociones',$this->Promociones->find("list",array("fields"=>array("promo_id","nombre","porcentaje"))));
       // $this->set('Categoria',  
        
    }
    
    function applyPaymentData()
    {
       // pr($this->data);
    }
}
