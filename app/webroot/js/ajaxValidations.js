
function beforeSaveData(classs){
	
    jQuery(document).ready(function() {
	    setTimeout(function() {
            
	        jQuery("."+classs).fadeOut(1500);
	    },3000);
	});
}