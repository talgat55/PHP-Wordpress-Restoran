<?php
/* 
*
*Template Name: Банкетный Зал
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row page-banket">
				<h1 class="section-title">Банкетный зал</h1>

				<div class="static-sec clearfix">
					<div class="col-md-4">
						<img  class="animation-block  opacity-zero" data-animation="zoomIn" src="<?php  echo get_theme_file_uri( '/assets/images/am.png' ) ?>">

						<p>120 посадочных мест</p>
					</div>
					<div class="col-md-4">
						<img  class="animation-block  opacity-zero" data-animation="zoomIn" src="<?php  echo get_theme_file_uri( '/assets/images/mn.png' ) ?>">

						<p>Скидка на меню</p>
					</div>
					<div class="col-md-4">
						<img   class="animation-block  opacity-zero" data-animation="zoomIn" src="<?php  echo get_theme_file_uri( '/assets/images/pl.png' ) ?>">

						<p>Площадь зала 200м2</p>
					</div>


				</div>
				 
				<div>
					<ul class="banket clearfix">
					<?php
							$thumb = $image = $img_url = '';

								$args = array(
								'post_type'        => 'banket'
								);
							$the_query = new WP_Query($args);
							while( $the_query->have_posts() ) :
								$the_query->the_post();
								$post_id = $the_query->post->ID;
								$files 	 = rwmb_meta( 'file_upload', $post_id ); 
				echo '<li> ';				
							foreach ($files as $key => $value) {
							 

									if($key == 0){
										//$thumb   = get_post_thumbnail_id($post_id);
										//$img_url = wp_get_attachment_url( $thumb,'full'); // Get img URL
										$image   = aq_resize( $value, 255, 170, true ); // Resize & crop img  

										echo '  <a href="'.$value.'"   data-fancybox="images" >';
											 if ( $image ) : 

											    echo '<img src="'.esc_url( $image ).'"   />';
											   /* <img src="<?php  echo get_theme_file_uri( '/assets/images/menu.jpg' ) ?>">*/

											 endif;  
			 
										echo '</a> ';

									}else{ 

										echo '  <div><a href="'.$value.'"   data-fancybox="images" ></a></div>';
									}

				

							}
								
					echo '</li>';		
 

							endwhile;

							/*
						<li>
							
							<a href="<?php  echo get_theme_file_uri( '/assets/images/8.jpg' ) ?>" data-lightbox="roadtrip"><img src="<?php  echo get_theme_file_uri( '/assets/images/8.jpg' ) ?>"></a>

						</li>

							*/
					?>

 
					 



					</ul>

				</div>

				<div class="form-banket-row ">
					
					<h1 class="section-title">Заявка на проведение банкета</h1>
					<?php  echo do_shortcode('[contact-form-7 id="58" title="Контактная форма 1"]'); ?>
				</div>




			</div>	

		</div>	

 	</section>
 

<?php get_footer();
