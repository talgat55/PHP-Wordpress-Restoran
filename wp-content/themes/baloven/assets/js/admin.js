jQuery(document).ready(function(){
	"use strict"; 
 
if(jQuery('.rwmb-file_input-clone').length){

	jQuery('.rwmb-file_input-clone').each(function(){
			var value = jQuery(this).find('input').val();

			jQuery(this).append('<div><img  width="90" src="'+value+'" /></div>')

	});

	jQuery(".rwmb-button.button-primary.add-clone").click(function() {


		///jQuery(this).parent().find('.rwmb-file_input-clone:last-child').css("background-color", "red");
		jQuery(this).parent().find('div.rwmb-clone:last').css("background-color", "red");
	});
	

}



 });