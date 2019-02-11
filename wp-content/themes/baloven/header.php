<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">  
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!-- Favicon -->
<link   rel="shortcut icon" href="<?php  echo get_theme_file_uri( '/assets/images/favicon.ico' ) ?>"  type="image/x-icon" />
 <title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48537263 = new Ya.Metrika({
                    id:48537263,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48537263" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117761377-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117761377-1');
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="top-bar">

		<div >г. Омск, ул. Иртышская Набережная 11\2</div>
		<div class="phone_number"><a href="tel:+73812530935" >+7 (3812) 53-09-35</a></div>

	</div>
	<header id="masthead" class="site-header" >


		<div class="container">
			<div class="header-block">
			<div id="logo">
				<a href="<?php echo home_url(); ?>" >
					<img src="<?php  echo get_theme_file_uri( '/assets/images/logo.png' ) ?>" alt="Logo">
				</a>
			</div>


				<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
					<div class="navigation-top">

						<?php wp_nav_menu('menu_id=menu-main&menu_class=menu-main-container clearfix&theme_location=main_menu');   ?>
					</div>
				<?php endif; ?>

				<div class="block-booking">
					<a href="#" class="btn btn-link">
						Забронировать столик
					</a>
				</div>
					<ul class="social-about-links">
						<li>
							<a href="https://vk.com/balovenomsk" class="img-social-about" target="_blank">
									<img style="    height: 20px;" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABHklEQVQ4T9WU0VECQRBEHxFoBmoESgRCBGoEaAYSARqBGoGGYAZCBhKBmAFGIPWo3aphvPPugw+dr9ud2d7u2Z4bsOcY7BmP/wF4BhwU6Z/AqnwfAjPAvLEG7oH30CZrTsP6S8kCHIXNkwB6DTyHnIB3Yf0KXGTAW+Dhl0PfLblj4CM96lSG0pZlla20YWDZBvgCTALgAhjVV84slXJVipsAR8BblFp6vYq2yb28KSzjwTkwLWAqq+HlktjxYb61r+eXwQk/jJ370gfUno+rnfKkKENZ0Vt9QbXbumn0NLJMm0A1vvnH9MJequHHbbMsU5t8nug9ATrCaGrPvOvnIJtL/VVAZLZ9zRJOTc25tWObPr3qrOli2AmQC/4+4AY0gjkUpoezVgAAAABJRU5ErkJggg==">
							</a>
						</li>	
						<li>
							<a href="https://www.instagram.com/balovenomsk/" class="img-social-about" target="_blank">
									<img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABa0lEQVQ4T52UAVHDQBBFXxVAFUAVAAqgDkBBQUHrgKIAcAAOcAAOoAoABYCCdh5zy1zSpLNhZzKTXO7+/t3/b0d0xyFw0PMvlj+Bj/aeUbWwD1wDl4DvmfgGHoAbwHcCUIBn4BhYAS+xYQeqZ86AI+ANmHomAO+AOfBYGGbYxR4ZzgrLZQBK137IMBu25qlU4tk9YCygArwD98CiBy0SWZrh9ytwUUCjwomA9sH+2dhlC/AcuC1J/SUT91mmoJHAcwo63QUYiX4KgICWaWlX1ZrrKUCVloXAdamufwGTqpoU4Lqnr6HqydCSBeyyUQgwrryaYmhpmlbD1iUroH3VHREpQPsnqCKE31TdGxJ2GQQYfrPE03LSgaBXTVBHg2HG2LLy2ZouBbVhbNe8et4WlftPmOg3aXs4aAlNOyQ6h4PooaqKZseXItkyR54X4G98yUhQmxvXK8NS+9g/n8aAbR82a+2zLnD7tiXSBhLka1WfyjYtAAAAAElFTkSuQmCC">

							</a>
						</li>
					</ul>


			</div>

		</div>






	</header>
	<div class="all-overlay"></div>
	<div class="modal-form-success-send">
		<span class="close">&#10005;</span>
		<img src="<?php  echo get_theme_file_uri( '/assets/images/logo.png' ) ?>">
		<div style="position: relative;">
			<h1 >Спасибо за заявку!</br> С вами свяжется менеджер</h1>
		</div>
		<p>Мы с радостью ждем Вас в нашем ресторане!</p>
	</div>


	<div class="modal-form form-banket-row top-modal">
		<span class="close">&#10005;</span>
		<h1 class="section-title" style="font-weight: 700; text-align: left;">Забронировать столик</h1>
		<?php  echo do_shortcode('[contact-form-7 id="36" title="Контактная форма 1"]'); ?>
	</div>


	<div class="site-content-contain">
