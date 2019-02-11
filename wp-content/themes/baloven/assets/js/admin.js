
jQuery(document).ready(function(){
	"use strict"; 
 
  
/*
* Page Check Home 
*/
if(jQuery('#page_template option:selected').val() == "front-page.php"){

	jQuery('#standard').fadeIn();
}

jQuery('#page_template').on('change', function() { 
  
  if(this.value == "front-page.php"){

  	jQuery('#standard').fadeIn();

  }

});


jQuery('.media-frame .media-button-select').click(function() {
	console.log('true check button');
});


/*
* Gallery Page Post type
*/
/*

jQuery('').on('change', function() { 
  
  alert(this.value);

});*/
window.checkyoutube =  function(value,selector){
			
			
			var matches = value.match(/watch\?v=([a-zA-Z0-9\-_]+)/);
			if (matches)
			{
					var videoid = value.match(/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/);

					value = 'https://img.youtube.com/vi/'+videoid[4]+'/0.jpg';
			}
			jQuery(selector).parent().append('<div class="img"><img  width="90" src="'+value+'" /></div>');

}


/*

	jQuery(".rwmb-file-input-select.button").click(function() {
		var value = jQuery(this).parent().find(' input').val();
		jQuery(this).parent().append('<div class="img"><img  width="90" src="'+value+'" /></div>');
		///jQuery(this).parent().find('.rwmb-file_input-clone:last-child').css("background-color", "red");
		//jQuery(this).parent().find('div.rwmb-clone').css("background-color", "red");
		 
	});*/
  
if(jQuery('#gallery-admin').length){
if(jQuery('.rwmb-file_input-clone').length){
ImgSolution();



function ImgSolution(){


	jQuery('.rwmb-file_input-clone').each(function(){
	
			var value = jQuery(this).find('input').val();
			var matches = value.match(/watch\?v=([a-zA-Z0-9\-_]+)/);
			if (matches)
			{
					var videoid = value.match(/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/);

					value = 'https://img.youtube.com/vi/'+videoid[4]+'/0.jpg';
			}
			jQuery(this).append('<div class="img"><img  width="90" src="'+value+'" /></div>');

	});

	jQuery(".rwmb-button.button-primary.add-clone").click(function() {


		///jQuery(this).parent().find('.rwmb-file_input-clone:last-child').css("background-color", "red");
		//jQuery(this).parent().find('div.rwmb-clone').css("background-color", "red");
		
		setTimeout(remodeImg, 50);
	});

 
}
function remodeImg(){
  //jQuery('.rwmb-clone:last').css("background-color", "red");
  jQuery('.rwmb-clone:last').find('img').parent().remove();
}

}
}





// end redy function
 });