// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------
 
jQuery(document).ready(function(){
	"use strict"; 
 

calculatemapposition();
mobileMenu();
animationblocks();
initSlider(); 
initForm();

initModalBlock();
 

jQuery('.telephone').inputmask({"mask": "+7 (999) 999-9999"});

 

//---------
// Carousel Action 
//--------

jQuery('.action-carousel').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow: jQuery('.action-nav .nav-link.right'),
  nextArrow: jQuery('.action-nav .nav-link.left')

});



// ---------------------------------------------------------
//  Bg Parallax
// ---------------------------------------------------------  
	if(jQuery('div[data-type="background"]').length){
		var bgwindowwidth = jQuery(window).width();
		if(bgwindowwidth > 1000){
			var $objWindow = jQuery(window);
			jQuery('div[data-type="background"]').each(function(){
				var $bgObj = jQuery(this);
				jQuery(window).scroll(function() {
					var yPos = -($objWindow.scrollTop() / $bgObj.data('speed'));
					var coords = '100% '+ yPos + 'px';
					$bgObj.css({ backgroundPosition: coords });

				});
			});
		}else{
			/*var $objWindow = jQuery(window);
			jQuery('div[data-type="background"]').each(function(){
				var $bgObj = jQuery(this); 
					var coords = '100%';
					$bgObj.css({ backgroundPosition: coords });

			 
			});*/
		}
		 
		
	}  

/*
* VK
*/	 
if(jQuery('#vk_groups').length){
 	VK.Widgets.Group("vk_groups", {mode: 3, width: "336", color3: '080808'}, 38256360);
}
/*
    clientId: 'bf3c3b1baa7b45df8ee696d7101c01f6',
    accessToken: '3244430401.1677ed0.466eda97ff5a40398b0dff5bd975f9ce',*/
 /*
 * Instagram
 */

if(jQuery('#instafeed').length){
	   var userFeed = new Instafeed({
	    get: 'user',
	    userId: '623597756',
	    clientId: '02b47e1b98ce4f04adc271ffbd26611d',
	    accessToken: '623597756.02b47e1.3dbf3cb6dc3f4dccbc5b1b5ae8c74a72',
	    resolution: 'standard_resolution',
	    template: '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>',
	    sortBy: 'most-recent',
	    limit: 8,
	    links: false
	  });
	  userFeed.run();
}

  /*
  * Yandex Map
  */

if(jQuery('#map').length){

  ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [54.968964, 73.379315],
            controls: ['geolocationControl','zoomControl'],
            zoom: 18
        }, {
           // searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
      /*  MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),*/

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), { 
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.

            iconImageHref: 'http://baloven.asmart-group.myjino.ru/wp-content/themes/baloven/assets/images/marker.png',
            // Размеры метки.
            iconImageSize: [30, 42],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-20, -7]
        });

    myMap.geoObjects

        .add(myPlacemark);

    myMap.behaviors.disable('scrollZoom');  
    myMap.behaviors.disable('multiTouch');
    
    if(jQuery(window).width() <= 600){

   	    myMap.behaviors.disable('drag'); 	
    }

});



}


// end redy function
});
jQuery(window).resize(function() {

    calculatemapposition();
    mobileMenu();
    animationblocks();
    initwidhttextarea();
    initModalBlock();
});

jQuery(window).load(function() {
initCarouselMenu();
initwidhttextarea();
});
//---------
// Carousel Menu 
//--------

function initCarouselMenu(){
	var carouselmenu = jQuery('.menu-carousel');
carouselmenu.owlCarousel({
    loop:true, 
    nav:false,
    dots:false, 
     margin:34,
    responsive:{
        0:{
            items: 1
        },
        600:{
            items: 2

        },
        900:{
            items:3
        },
        1100:{
            items:4
        }
    }
});

    jQuery(".menu-carousel-arrow-right").click(function() { 
        carouselmenu.trigger('next.owl.carousel');
        return false;
    });
	
    jQuery(".menu-carousel-arrow-left").click(function() {
        carouselmenu.trigger('prev.owl.carousel');
        return false;
    });



}

/*
* Modal
*/
function initModalBlock(){

	jQuery(".modal-form .close").click(function() {

		jQuery('.all-overlay').removeClass('overlay-display');

		jQuery('.modal-form').css({top: '-165%' }); 

		return false;

	});


    jQuery(".block-booking a").click(function() {
       
			var windowwidth 	= jQuery(window).width();
			var modalwidht 	= jQuery('.modal-form').width();
			var windowheight 	= jQuery(window).height();
			var topbarheight 	= jQuery('.top-bar').height();
			var windowmodalheight 	= jQuery('.modal-form').height();
			var redyleft = (windowwidth- modalwidht)/2;
			var redytop = (windowheight- windowmodalheight)/2;

		if(windowwidth >= 900){


			jQuery('.modal-form').css({ left: redyleft, top: redytop }); 
		}else{
			jQuery('.modal-form').css({  top: topbarheight }); 
		}


			jQuery('.all-overlay').addClass('overlay-display');


        return false;
    });
	

	jQuery( ".all-overlay" ).click(function(){  
			jQuery('.all-overlay').removeClass('overlay-display');

					jQuery('.modal-form').css({top: '-165%' }); 
			return false;
});

}

/*
*  Width textarea
*/
function initwidhttextarea(){
var windowwidthmodal 	= jQuery('.form-banket-row').width();
var windowwidtblock 	= jQuery('.form-banket-row.page-bunket').width();
var redywidth = windowwidthmodal-21; 
var redywidthblock = windowwidtblock-21; 
jQuery('.wpcf7-form-control.wpcf7-textarea').css({ width: redywidth });

jQuery('.form-banket-row.page-bunket .wpcf7-form-control.wpcf7-textarea').css({ width: redywidthblock });


}

/*
* Form 
**/
function initForm(){
jQuery( ".dateform-chancge" ).focus(function() {
  	jQuery(this).prop("type", "date");
});
	var windowwidth = jQuery(window).width(); 
	if(windowwidth <=900){
		jQuery( ".text-times input" ).focus(function() {
		  	jQuery(this).prop("type", "time");
		});

	}else{
		jQuery('.timer').timepicker({
			timeOnlyTitle: 'Выберите время',
			timeText: 'Время',
			hourText: 'Часы',
			minuteText: 'Минуты',
			secondText: 'Секунды',
			currentText: 'Сейчас',
			closeText: 'Закрыть'
		});


	}


}


/*
* Slider 
**/
function initSlider(){
var owl = jQuery('.slider-home');
owl.owlCarousel({
    loop:true, 
    items: 1,
    autoplay:true,
	autoplayTimeout:4000,
    smartSpeed:1000,
    nav: true,  
    dots:false
 
});

/*
    jQuery(".am-next").click(function() {
        owl.trigger('next.owl.carousel');
        return false;
    });
	
    jQuery(".am-prev").click(function() {
        owl.trigger('prev.owl.carousel');
        return false;
    });*/
}
/*
* Animation
*/
function animationblocks(){

	var windowwidth = jQuery(window).width(); 
	if (windowwidth >= 899) { 
		jQuery('.animation-block').each(function(){
			jQuery(this).appear(function() {
 
				var $this = jQuery(this);
				var animcalass= $this.data('animation');
				$this.addClass(' animated ' + animcalass);
						 
		},{accX: 0, accY: -50})});
	}else{
		jQuery('.animation-block').addClass(' animated ');
	}
}

/*
* Calculate block  Map
*/
function calculatemapposition(){
	var windowwidth = jQuery(window).width(); 
	if (windowwidth >= 1170) { 
		var windowwidthcontainer = jQuery('.container').width();
		var leftwidht = (windowwidth -windowwidthcontainer)/2 +15;
		console.log(windowwidth + ' ' +windowwidthcontainer+ ' ')
		jQuery('.map-overlay-block-wallpaper').css({ left: leftwidht });

	}

}

/*
* Mobile Menu
*/
function mobileMenu() {
		var windowwidth = jQuery(window).width(); 
	 
	if(windowwidth <= 1170){  
	jQuery('#mobile-bar').click(function(){  
		jQuery('.navigation-top').toggleClass("menu-open");
		jQuery('#mobile-bar a').toggleClass(" is-active");
			 
		return false;
	});
		// accordion
		jQuery('.menu-main-container').find('li a').click(function(){
			   jQuery(this).next().stop().slideToggle();
			   jQuery(this).toggleClass("accordion-open");
		}).next().stop().hide();		
	}
 
	
}
