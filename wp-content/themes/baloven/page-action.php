<?php
/* 
*
*Template Name: Акции
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row">
				<h1 class="section-title">Акции</h1>

				<div class=" clearfix">
					<ul class="list-news list-load-more"  data-type="action">
					 <?php

					 	$args = array(  
					 		'order' => 'DESC',
							'post_type'	=> 'action'
						);

						$the_query = new WP_Query($args);

						
						
						
						while( $the_query->have_posts() ) :
							$the_query->the_post();
							$post_id = $the_query->post->ID;
							 
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post_id),'full');
							$image   = aq_resize( $img_url, 604, 340, true );

 							echo '<li class="clearfix">';
 							
 								// <div class="item-text animation-block  opacity-zero " data-animation="slideInUp">
 							echo '
 								<a href="'.get_permalink($post_id).'"  class="item-list-wallpapers">

 
 									<div class="item-img">
 										
 										<div class="img" style="background-image: url('.$image.'); "></div>
 										<div class="arrow-news"></div>
 										<div class="overlay-bg-item"></div>
 									</div>
 									
 									 

 									
 									<div class="item-text ">
 										<h2>'.get_the_title($post_id).'</h2>

 										<p>
 											'.my_string_limit_words(get_the_content($post_id),9).'
 										</p>
 									</div>
 									

 								</a>';


 							echo '</li>';

							
						endwhile;	


					 ?>
					 <a href="#" class="btn btn-link-more load-more">
					 	<img class="arrow-butt" src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> 
					 	<img class="loadmore-loader" src="<?php  echo get_theme_file_uri( '/assets/images/ajax-loader-cf.gif' ) ?>">
					 	Все Акции</a>
				 	</ul>

				</div>
				 




			</div>	

		</div>	

 	</section>
 

<?php get_footer();
