function preAction(section,f0cus)
{
    jQuery(section).show();
    jQuery('html,body,div').animate({
        scrollTop:jQuery(section).offset().top
        },2000);
    jQuery(f0cus).focus();	
}

function loginForm()
{
    preAction("#log_in_panel","#username");
    jQuery('#log_in_panel').slideDown(3000);
}

function dateBurn(id,f)
{
    var currentTime = new Date();
    var year = currentTime.getFullYear();
    jQuery('#'+id).datetimepicker({
        lang:'es',
        timepicker:false,
        startDate:	'1970-01-01',
        maxDate:'+1970-01-02',
        format:f,
        formatDate:f,
        defaultDate:jQuery('#'+id).val()
       }); 
}

function soloNumeros(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    
    if(charCode === 45 )
    {
        return true;
    }
    
    if(charCode < 47 || charCode > 57)
    {
        if(charCode === 8 )
        {
            return true;
        }
        
        if(charCode === 32 )
        {
            return false;
        }
        
        if(charCode === 46 )
        {
            return false;
        }
        return false;

    }else{
            return true;
         }
         
   
}

 function soloLetras(e)
 {
     key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

    if(letras.indexOf(tecla)===-1 && !tecla_especial){
        return false;
    }
}

var telefono = new Array(3,3,4);
var fechas = new Array(4,2,2);
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value;
	largo = val.length;
	val = val.split(sep);
	val2 = '';
	for(r=0;r<val.length;r++){
		val2 += val[r];
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g");
				val2 = val2.replace(letra,"");
			}
		}
	}
	val = '';
	val3 = new Array();
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s]);
		val2 = val2.substr(pat[s]);
	}
	for(q=0;q<val3.length; q++){
		if(q === 0){
			val = val3[q];
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q];
				}
		}
	}
	d.value = val;
	d.valant = val;
	}
}
//
//function autoCompleteCiudades(){
//    jQuery( "#ciudad" ).combogrid({
//		url: '../../app/webroot/files/world.php',
//		debug:true,
//        delay: 5, 
//        //replaceNull: true,
//		colModel: [{'columnName':'idCiudades','width':'10','label':'ID'}, {'columnName':'Ciudad','width':'60','label':'Ciudad'},{'columnName':'Paises_Codigo','width':'30','label':'Codigo'}],
//		select: function( event, ui ) {
//			jQuery( "#ciudad" ).val( ui.item.Ciudad );
//            jQuery( "#ciudad_id" ).val( ui.item.idCiudades );
//			return false;
//		}
//	});
//}
//
//function autoCompleteEstados(){
//    jQuery( "#estado" ).combogrid({
//		url: '../../app/webroot/files/world.php',
//		debug:true,
//        delay: 5, 
//        //replaceNull: true,
//		colModel: [{'columnName':'idCiudades','width':'10','label':'ID'}, {'columnName':'Ciudad','width':'60','label':'Estado'},{'columnName':'Paises_Codigo','width':'30','label':'Codigo'}],
//		select: function( event, ui ) {
//			jQuery( "#estado" ).val( ui.item.Ciudad );
//            jQuery( "#estado_id" ).val( ui.item.idCiudades );
//			return false;
//		}
//	});
//}
//
//function autoCompletePaises(){
//    jQuery( "#pais" ).combogrid({
//		url: '../../app/webroot/files/world-pais.php?p'+jQuery( "#pais_id" ).val(),
//		debug:true,
//        delay: 5, 
//        //replaceNull: true,
//		colModel: [
//                   {'columnName':'Codigo','width':'10','label':'ID'}, 
//                   {'columnName':'Pais','width':'60','label':'Pais'}
//                  ],
//		select: function( event, ui ) {
//			jQuery( "#pais" ).val( ui.item.Pais );
//            jQuery( "#pais_id" ).val( ui.item.Codigo );
//			return false;
//		}
//	});
//}

/*
function defaultLocalidad(){
    if(jQuery( "#pais_id" ).val()==='' && 
       jQuery( "#estado_id" ).val()===''&& 
       jQuery( "#ciudad_id" ).val('')
      ){
        jQuery( "#pais" ).val('México');
        jQuery( "#pais_id" ).val('MX');
        jQuery( "#estado" ).val('Veracruz');
        jQuery( "#estado_id" ).val('8236');
        jQuery( "#ciudad" ).val('Xalapa');
        jQuery( "#ciudad_id" ).val('101285');
      }
}
*/

function animatePB(barr,por100)
{
    por_act = parseInt(jQuery( "#porciento").val());
    var por = parseInt(por100) + por_act;
    jQuery( "#porciento").val(por);
    
    jQuery( "#"+barr ).css('width',por+'%');
}
function currDistrict()
{
    jQuery("#curr_district").val(jQuery("#estado_id option:selected").html());
}