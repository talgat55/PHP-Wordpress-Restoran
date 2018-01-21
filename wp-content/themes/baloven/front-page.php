<?php get_header(); ?>
 

 	<section class="slider-h">
	<div  class=" owl-carousel owl-theme slider-home" >
		<?php


			$argsslideer = array(
				'post_type' => 'slider'
			);

			$the_query_slider = new WP_Query($argsslideer);
				while( $the_query_slider->have_posts() ) :
						$the_query_slider->the_post();
						$post_id_slider = $the_query_slider->post->ID;
					$thumb   = get_post_thumbnail_id($post_id_slider);
					$img_url = wp_get_attachment_url( $thumb,'full'); // Get img URL
					$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img 

					if($image){ 

					 	echo '<div class="slider-walpaper" style="background: url('.esc_url( $image ).' );">
								<div class="slider-overlay"></div>
								<div  class="title-slider" ><h1>'.get_the_title($post_id_slider).'</h1></div>
						</div>';

					}else{

						echo '<div class="slider-walpaper" style="background: url('.get_theme_file_uri( 'assets/images/sl_bg.jpg').' );">
								<div class="slider-overlay"></div>
								<div  class="title-slider" ><h1> Мы знаем как вас побаловать </h1></div>
						</div>';

					}

				endwhile;

		?>


	 


	</div> 
	</section> 
	 

	<section class="about-home" >
		<div class="container">
			 <div class="row">
				<h1 class="section-title ">О ресторане</h1>
				<div class="row-about">
				<div class="half-row-about">
					<p class="about-block home animation-block  opacity-zero" data-animation="slideInLeft">
						Ресторан «Баловень» - концептуальный ресторан семейного типа. «Баловень» одинаково хорош для приятного ужина в компании друзей, для деловых переговоров за бизнес-ланчем, для чашечки капучино с черемуховым десертом во время прогулки по набережной Иртыша. 
					</p>
				</div>
				<div class="half-row-about">
					<img class=" animation-block  opacity-zero " data-animation="slideInRight" src="<?php  echo get_theme_file_uri( '/assets/images/about.jpg' ) ?>">
					<!--<div class="about-home-img"></div>-->
				</div>
				</div>

  
		</div>
		</div>

	</section>

	<section class="menu-home" >
		<div class="container">
			 <div class="row">
				<h1 class="section-title">Меню</h1>
		 
				<div class="owl-carousel owl-theme menu-carousel">

					<?php
							$thumb = $image = $img_url = '';

								$args = array(
								'post_type'        => 'menu'
								);
							$the_query_menu = new WP_Query($args);
							while( $the_query_menu->have_posts() ) :
								$the_query_menu->the_post();
								$post_id_menu = $the_query_menu->post->ID;
							$thumb   = get_post_thumbnail_id($post_id_menu);
							$img_url = wp_get_attachment_url( $thumb,'full'); // Get img URL
							$image   = aq_resize( $img_url, 211, 201, true ); // Resize & crop img  

							echo '<div class="item">';
								 if ( $image ) : 

								    echo '<img src="'.esc_url( $image ).'"   />';
								   /* <img src="<?php  echo get_theme_file_uri( '/assets/images/menu.jpg' ) ?>">*/

								 endif;  

								 echo '<div class="title-menu-walp"><h3>'.get_the_title($post_id_menu).'</h3></div>';
								 echo '<p class="text-menu">'.get_the_content($post_id_menu).'</p>';
								 echo '<span class="border-bottom-menu"></span>';
								 echo '<div class="price">'.get_post_meta($post_id_menu, 'my_meta_price', true).'<img  src="'.get_theme_file_uri( '/assets/images/ruble.png' ).'"></div>';
								 echo '</div> '; 

							endwhile;
					?>
  
				</div>
						<a href="#" class="btn btn-link-menu"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>">Все меню</a>
  
			</div>
		</div>

	</section>

	<section class="gallery-home" >
		<div class="container">
			 <div class="row">
				<h1 class="section-title">Галерея</h1>
		 
				<ul class="list-gallery clearfix">
					<?php 
									
						 	$thumb = $image = $img_url = '';
							$i = 0;
								$args2 = array(  
									'meta_key'  		=> 'check_shhow',
									'meta_value' 		=> '1',
									'post_type'        	=> 'gallery'
								);
							$the_query_gallery = new WP_Query($args2);
								while( $the_query_gallery->have_posts() ) :
								$the_query_gallery->the_post();
								$post_id_gallery = $the_query_gallery->post->ID;

								$thumb_event = rwmb_meta( 'thumb_event', array( 'limit' => 1 ),$post_id_gallery );
								$thumb_event = reset( $thumb_event );
								$redydate 	 = rwmb_meta( 'date_event', $post_id_gallery );
							 	$redytitle 	 = rwmb_meta( 'name_event',array( 'limit' => 1 ), $post_id_gallery );

								$image   = aq_resize( $thumb_event['full_url'], 545, 364, true );
							 	if($i <=6){
								echo '	<li class="item animation-block  opacity-zero" data-animation="fadeInUp">
											';
										if($image) :
												echo '
												<div class="over-img-gal">

												<img src="'.esc_url( $image ).'">
													
												<div class="gallery-text">
												<div class="bre-holder">
												<div class="bre-holder-inc">
													<div class="bre-inler">
													<h6>' .date("d.m.Y", strtotime($redydate)).'</h6>
													<h4>'.$redytitle.'</h4>
													<a href="' . get_permalink( $post_id_gallery ) . '"  ></a>

												</div>
												</div>
												</div>
												</div>
												

												</div>

												';
										else :
											echo '<a href="' . get_permalink( $post_id_gallery ) . '"  ><span></span><img src="'. get_theme_file_uri( "/assets/images/gallery.jpg ").'></a>';

										endif;
								echo '		
										</li>';

							 	}elseif ($i >6) {
									break;
								}	

 
								
								$i++;
								endwhile;

				/*
							while( $the_query_gallery->have_posts() ) :
							if($i <=6){
								$the_query_gallery->the_post();
								$post_id_gallery = $the_query_gallery->post->ID;


								$thumb   = get_post_thumbnail_id($post_id_gallery);
								$img_url = wp_get_attachment_url( $thumb,'full'); // Get img URL
								$image   = aq_resize( $img_url, 545, 364, true ); // Resize & crop img  

								echo '	<li class="item animation-block  opacity-zero" data-animation="fadeInUp">
											';
											if($image) :
												echo '<a href="'.$img_url.'" data-lightbox="roadtrip"><span></span><img src="'.esc_url( $image ).'"></a>';
												/*	echo '<img src="<?php  echo get_theme_file_uri( '/assets/images/gallery.jpg' ) ?>">';*/
							/*				endif;
								echo '		
										</li>';
							}elseif ($i >6) {
								break;
							}			

							$i++;

							endwhile;*/
					?> 
				 	<li class="item">
					<span class="link-gallery-more">
						  <a href="#"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>">Смотреть больше</a>
					</li>
				 
				</ul>
  
			</div>
		</div>

	</section>


	<section class="action-home" >
			<div class="container">
			 	<div class="row">
				
					<h1 class="section-title">Акции</h1>
		 				 
				</div>
			</div> 
		<div class="bg-action-home">	
			<div class="slider-overlay"></div>	
			<div class="parallax-layer" style="background-image: url(<?php  echo get_theme_file_uri( '/assets/images/bg.jpg' ) ?>); padding: 51px 0;" data-type="background" data-speed="40">
				<div class="container add-relative">
				 	<div class="row padding-row">
						<ul class="action-carousel"> 
					<?php 
						$thumb = $image = $img_url = '';
						$i = 0;
								$args3 = array(
								'orderby' => array('date' => 'DESC'),
								'post_type'        => 'action'
								);
							$the_query_action = new WP_Query($args3);
							while( $the_query_action->have_posts() ) :
								$the_query_action->the_post();
								$post_id_action = $the_query_action->post->ID;

								echo '<li class="item"> ';
								echo '<h3>'.get_the_title($post_id_action).'</h3>';
								echo '<p class="text-action">'.get_the_content($post_id_action).'</p>';
								echo '	<span class="border-bottom-action"></span>
						    				<div class="action-nav">
						    					<a href="#" class="nav-link left">
						    						<img src="'.get_theme_file_uri( '/assets/images/arrow-eft.png' ).'">
						    					</a>
						    					<a href="#" class="nav-link right">
						    						<img src="'.get_theme_file_uri( '/assets/images/arrow.png' ).'">
						    					</a>
						    				</div>
						    		  </li> ';
							endwhile;
					?>			 
						</ul>	 
					</div>
				</div> 
			</div> 
		</div>
	</section>

	<section class="social-home">
 
				<div class="container add-padd-soc">
				 	<div class="row padding-row">
						 	 <div class="col-3">
						 	 	<div class="vk-block">
						 	 		<h3>
						 	 			ВКонтакте
						 	 		</h3>
						 	 		<p>#баловеньомск</p>
						 	 		<p>#кудапойтивомске</p>
						 	 	</div>

								<!-- VK Widget -->
								<div id="vk_groups" ></div>
									 
						 	 </div>						 	 
						 	 <div class="col-9">
						 	 	<div class="insta-block">
						 	 		<h3>INSTAGRAM</h3>
						 	 		<p>
						 	 			@balovenomsk
						 	 		</p>
						 	 		<a href="#" class="btn btn-link-insta"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> Подписаться</a>
						 	 	</div>
						 	 	<div id="instafeed" class="clearfix"></div>

 						 	 </div>
					</div>
				</div>  
	</section>
	<section style="position: relative;"> 
			<div class="map-overlay-block-wallpaper">
				<!--<div class="container">
					<div class="row padding-row">-->
					<div class="map-overlay-block">
						<h4>Адрес</h4>
						<p>Иртышская Набережная 11\2</p>
						<span class="border-bottom-adress"></span>
						<h4>Телефон</h4>
						<p class="font-lato-light"><a href="tel:+73812530935">+7 (3812) 53-09-35</a></p>
						<span class="border-bottom-adress"></span>
						<h4>Время работы</h4>
						<p class="font-lato-light">
							ПН - ЧТ - с 11:00 до 23:00</br>
							ПТ - СБ - с 11:00 до 01:00</br>
							ВС – с 12:00 до 23:00</p>
						<span class="border-bottom-adress"></span>
						<h4>Почта</h4>
						<p ><a href="mailto:baloven-omsk@mail.ru">baloven-omsk@mail.ru</a></p> 
					
					</div>
					<!--</div>
				</div>-->
			</div>
		<div id="map" width="100%" class="ya_map">
			



		</div>
	</section>
 

<?php get_footer();
