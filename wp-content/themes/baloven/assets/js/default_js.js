 document.addEventListener('wpcf7mailsent', function( event ) {
 //document.addEventListener('wpcf7submit', function( event ) {
 	 
if(event.detail.contactFormId=="36" || event.detail.contactFormId=="151"){ 

	successsendmail();
}
}, false );

/*
* Auto hide modal Success send mail
*/
function hidemodalsuccess(){
		jQuery('.all-overlay').removeClass('overlay-display');

		jQuery('.modal-form-success-send').removeClass('overlay-display-success');
}
function showmodalsuccess(){
	var $this = jQuery('.modal-form-success-send'); 

	$this.addClass(' overlay-display-success ');
	jQuery('.all-overlay').addClass('overlay-display');
}

/*
* Action For send email
*/

function successsendmail(){
	var $this = jQuery('.modal-form-success-send');
				var modal = jQuery('.modal-form');
				var offsetElement = modal.offset();
				var heightModal = 	modal.height();
				var redypush = offsetElement.top + heightModal+40;
				 
	jQuery('.modal-form').fadeOut(200).css({top: -redypush }).fadeIn(),

//	$this.delay(300).addClass(' overlay-display-success ');

	 setTimeout(showmodalsuccess, 300);
	
	jQuery(".modal-form-success-send .close").click(function() {

		jQuery('.all-overlay').removeClass('overlay-display');

		$this.removeClass('overlay-display-success');

		return false;

	});

	
		 setTimeout(hidemodalsuccess, 3000);	
	
		
 	 
}

 

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
  autoplay: true,
  prevArrow: jQuery('.action-nav .nav-link.right'),
  nextArrow: jQuery('.action-nav .nav-link.left')

});


    jQuery( ".link-filter-gallery" ).click(function(){

    	if(jQuery(this).html() == 'Видео'){
            jQuery('.gallery-images-cat').slideUp();
            jQuery('.gallery-video-cat').slideDown();
            jQuery('.link-filter-gallery').removeClass('current');
            jQuery(this).addClass(' current');
		}else {
            jQuery('.gallery-images-cat').slideDown();
            jQuery('.link-filter-gallery').removeClass('current');
            jQuery(this).addClass(' current');
            jQuery('.gallery-video-cat').slideUp();
		}


        return false;
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
		userId: '242335681',  
		clientId: '7902101a208c4cb6832483a22da1fec1', 
		accessToken: '3791917042.7902101.42d5cc85bd3648249c4bbb7684caaed6',
	    resolution: 'standard_resolution',
	    template: '<a href="{{link}}" target="_blank" id="{{id}}" class="focuspoint" >  <img  src="{{image}}" /> </a>',
	    sortBy: 'most-recent',
	    limit: 8,
	    links: false
	  });
	   
	  userFeed.run();

/*
* Resize images
**/
	/* jQuery('.focuspoint').cropbox({
	    width: 164,
		height: 132
	}, function() {
		//on load
		console.log('Url: ' + this.getDataURL());
	}).on('cropbox', function(e, data) {
        console.log('crop window: ' + data);
	});*/
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


/*
*  Function Hide overlay layer and hide blocks modal form  and success notice
*/

jQuery( ".all-overlay" ).click(function(){  
	jQuery('.all-overlay').removeClass('overlay-display');
				var modal = jQuery('.modal-form');
				var offsetElement = modal.offset();
				var heightModal = 	modal.height();
				var redypush = offsetElement.top + heightModal+40;
				modal.css({top: -redypush });  
	jQuery('.modal-form-success-send').removeClass(' overlay-display-success ');


			return false;
});

 
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
initCarouselMenuCat();

    
});
 
//---------
// Carousel Menu Cat
//--------

function initCarouselMenuCat(){
	var carouselmenu = jQuery('.menucat-list');
carouselmenu.owlCarousel({
    loop:true, 
    nav:false,
    autoplay:true,
	autoplayTimeout:4000,
    dots:false, 
    margin:84,
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
/*
    jQuery(".menu-carousel-arrow-right").click(function() { 
        carouselmenu.trigger('next.owl.carousel');
        return false;
    });
	
    jQuery(".menu-carousel-arrow-left").click(function() {
        carouselmenu.trigger('prev.owl.carousel');
        return false;
    });
*/

     jQuery(".menu-carousel-arrow-right").click(function() {  
        carouselmenu.trigger('owl.next');
        return false;
    });
	
    jQuery(".menu-carousel-arrow-left").click(function() { 
        carouselmenu.trigger('owl.prev');
        return false;
    });


}
//---------
// Carousel Menu 
//--------

function initCarouselMenu(){
	var carouselmenu = jQuery('.menu-carousel');
	carouselmenu.owlCarousel({
    loop:true, 
    nav:false,
    autoplay:true,
	autoplayTimeout:4000,
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
/*
    jQuery(".menu-carousel-arrow-right").click(function() { 
        carouselmenu.trigger('next.owl.carousel');
        return false;
    });
	
    jQuery(".menu-carousel-arrow-left").click(function() {
        carouselmenu.trigger('prev.owl.carousel');
        return false;
    });
*/

    jQuery(".menu-carousel-arrow-right").click(function() { 
       jQuery(this).closest('.row-carousel').find('.owl-carousel').trigger('next.owl.carousel');
        return false;
    });
	
    jQuery(".menu-carousel-arrow-left").click(function() {
        jQuery(this).closest('.row-carousel').find('.owl-carousel').trigger('prev.owl.carousel');
        return false;
    });

}

/*
* Modal
*/
function initModalBlock(){

	jQuery(".modal-form .close").click(function() {

		jQuery('.all-overlay').removeClass('overlay-display');
			 
				var modal = jQuery('.modal-form');
				var offsetElement = modal.offset();
				var heightModal = 	modal.height();
				var redypush = offsetElement.top + heightModal +40;
				modal.css({top: -redypush }); 




		return false;

	});


    jQuery(".block-booking a, .order-new-stol").click(function() {
       
			var windowwidth 	= jQuery(window).width();
			var modalwidht 	= jQuery('.modal-form').width();
			var windowheight 	= jQuery(window).height();
			var topbarheight 	= jQuery('.top-bar').height();
			var windowmodalheight 	= jQuery('.modal-form').height();
			var redyleft = (windowwidth- modalwidht)/2;
			var redytop = (windowheight- windowmodalheight)/2;

			jQuery('#responsive-menu-button').trigger('click');


		if(windowwidth >= 900){


			jQuery('.modal-form').css({ left: redyleft, top: redytop }); 
		}else{
			jQuery('.modal-form').css({  top: topbarheight }); 
		}


			jQuery('.all-overlay').addClass('overlay-display');


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

	var windowwidth = jQuery(window).width(); 
	if(windowwidth <=900){
		jQuery( ".text-times input" ).focus(function() {
		  	jQuery(this).prop("type", "time");
		});
		jQuery( ".dateform-chancge" ).focus(function() {
		  	jQuery(this).prop("type", "date");
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


	jQuery('.datepicker-here').datepicker();
	jQuery.datepicker.setDefaults(
	  jQuery.extend(
	    {'dateFormat':'dd.m.yy'},
	    jQuery.datepicker.regional['ru']
	  )
	);

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
   // autoplay:true,
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

/*	if(windowwidth >= 1000){
		jQuery('.item-list-wallpapers').each(function(){
			jQuery(this).appear(function() {
 
				var $this = jQuery(this); 
				$this.addClass(' showblock ');
						 
		},{accX: 0, accY: -50})});


	}else{

		jQuery('.item-list-wallpapers').addClass(' showblock ');

	}*/


		// for menucat list  show hide block

		if(jQuery('.menucat-list').length){
			jQuery('.animation-block').each(function(){
				var $this = jQuery(this);
				setTimeout( showblockmenucat($this), 900); 
			});
		}

}
function showblockmenucat($this){
  $this.addClass(' animated ')
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
    jQuery(function ($) {
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: '&#x3c;Пред',
            nextText: 'След&#x3e;',
            currentText: 'Сегодня',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthNamesShort: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
            dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            weekHeader: 'Нед',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);
    });