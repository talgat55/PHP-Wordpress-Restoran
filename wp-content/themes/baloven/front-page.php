<?php
/* 
*
*Template Name: Домашняя страница
*
*/?>
<?php get_header(); ?>

		<?php

			$argsslideer = array(
				'posts_per_page'   => -1,
				'post_type' => 'slider',
				'post_status' => 'publish'
			);

			$the_query_slider = new WP_Query($argsslideer);
		if($the_query_slider->have_posts()):
echo '<section class="slider-h clearfix">
	<div  class=" owl-carousel owl-theme slider-home" >';
				while( $the_query_slider->have_posts() ) :
						$the_query_slider->the_post();
						$post_id_slider = $the_query_slider->post->ID;
					$thumb   = get_post_thumbnail_id($post_id_slider);
					$img_url = wp_get_attachment_url( $thumb,'slide'); // Get img URL
					$link = rwmb_meta( 'link-meta', $post_id_slider );
				//	$image   = aq_resize( $img_url, 1200, 800, true ); // Resize & crop img


					 	echo '<div class="slider-walpaper"  >
								<div class="slider-overlay"></div>
								<img src="'.esc_url( $img_url ).'" alt="слайд">
								<a href="'.$link.'" target="_blank" class="title-slider" ></a>
						</div>';



				endwhile;
echo '</div> 
	</section> 
';
		endif;

		?>


	 


	
	<section class="about-home" >
		<div class="container">
			 <div class="row">
				<h1 class="section-title ">О ресторане</h1>
				<div class="row-about">
				<div class="half-row-about">
					<div class="about-block home animation-block  opacity-zero" data-animation="slideInLeft">
					<p  >
						«Баловень» — концептуальный ресторан семейного типа, который одинаково хорош для приятного ужина в компании друзей, деловых переговоров за бизнес-ланчем или чашкой ароматного капучино. </br>
						Здесь вас ждут самые вкусные европейские, средиземноморские, итальянские и французские закуски, вторые блюда и десерты
					</p>

					</div>
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
			 <div class="row padding-row">
				<h1 class="section-title">Меню</h1>
		 		<div class="row-carousel menu-part-walp" style="position: relative;">
				<div class="owl-carousel owl-theme menu-carousel">

					<?php
							$thumb = $image = $img_url = '';

								$args = array(
								'posts_per_page'   => -1,
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

								    echo '<a href="'.$img_url.'"   data-fancybox="images" ><img class="img-border" src="'.esc_url( $image ).'"   /></a>';
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
				
					<a href="#" class="menu-carousel-arrow-left"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-l.jpg' ) ?>"></a>
					<a href="#" class="menu-carousel-arrow-right"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-r.jpg' ) ?>"></a>
				</div>
				<div class="block-buttons">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
						<?php  
							$file_busines 	 = rwmb_meta( 'file_busines');
						  
							echo '<a target="_blank" href="'.$file_busines.'" class="btn btn-link-menu padding-right">Бизнес-ланч</a>';
							?> 
					<?php endwhile; endif; ?>		
						<a href="http://www.baloven-omsk.ru/menus/" class="btn btn-link-menu padd-button-menu">Все меню</a>
				</div>
  
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
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category_gallery',
                                            'field' => 'slug',
                                            'terms' => 'images'
                                        )
                                    ),
									'posts_per_page'   	=> 6,
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
						  <a href="http://www.baloven-omsk.ru/galleries/"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>">Смотреть больше</a>
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
								'posts_per_page'   => -1,
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
						    						<img src="'.get_theme_file_uri( '/assets/images/arrow-thin-left.png' ).'">
						    					</a>
						    					<a href="#" class="nav-link right">
						    						<img src="'.get_theme_file_uri( '/assets/images/arrow-thin-right.png' ).'">
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
						 	 		<a  target="_blank" href="https://www.instagram.com/balovenomsk/" class="btn btn-link-insta"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> Подписаться</a>
						 	 	</div>
								 <div class="instagram-main-block">
									 
								 
						 	 	<?php
	
	  $c = curl_init('http://widget.stapico.ru/?q=balovenomsk&s=98&w=3&h=3&b=0&p=5&title=balovenomsk&profile=no&header=no&effect=0');
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  $content = curl_exec($c);
  $pattern = "|href=\"[^\"]+\"|is";
  $content = preg_replace($pattern, "href=\"https://www.instagram.com/balovenomsk\"", $content);
echo $content;
 ?> 
</div>
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
							ПН - ЧТ - с 12:00 до 00:00</br>
							ПТ - СБ - с 12:00 до 02:00</br>
							ВС – с 12:00 до 00:00</p>
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
