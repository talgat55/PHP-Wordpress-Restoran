<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"> 
	<!-- Favicon -->
<link rel="icon" href="<?php  echo get_theme_file_uri( '/assets/images/favicon.png' ) ?>" type="image/x-icon" />
 <title><?php bloginfo('name'); ?></title> 
<?php wp_head(); ?>
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
				<div id="mobile-bar">  

					<a class="hamburger hamburger--slider" >
					  <span class="hamburger-box">
					    <span class="hamburger-inner"></span>
					  </span>
					</a>


				</div>
				<div class="block-booking">
					<a href="#" class="btn btn-link">
						Забронировать столик
					</a>
				</div>


			</div>

		</div>






	</header> 
	<div class="all-overlay"></div>
	<div class="modal-form form-banket-row">
		<span class="close">&#10005;</span>
		<h1 class="section-title" style="font-weight: 700; text-align: left;">Забронировать столик</h1>
		<?php  echo do_shortcode('[contact-form-7 id="58" title="Контактная форма 1"]'); ?>
	</div>
 

	<div class="site-content-contain"> 
