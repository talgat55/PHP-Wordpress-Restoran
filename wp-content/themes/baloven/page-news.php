<?php
/* 
*
*Template Name: Новости
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row">
				<h1 class="section-title">Новости</h1>

				<div class=" clearfix">
					<ul class="list-news list-load-more"  data-type="post">
					 <?php

					 	$args = array(  
							'order' => 'DESC',
							'post_type'	=> 'post'
						);

						$the_query = new WP_Query($args);

						
						
						
						while( $the_query->have_posts() ) :
							$the_query->the_post();
							$post_id = $the_query->post->ID;
							 
							$img_url = wp_get_attachment_url( get_post_thumbnail_id($post_id),'news-size');
							$image   =  $img_url; // aq_resize( $img_url, 853, 853, true );

 							echo '<li class="clearfix">';
 							
 								// <div class="item-text animation-block  opacity-zero " data-animation="slideInUp">
 								// $content = get_the_content();
								$content = preg_replace("/<img[^>]+\>/i", " ", $content);          
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]>', $content);
 							echo '
 								<a href="'.get_permalink($post_id).'" class="item-list-wallpapers">

 
 									<div class="item-img">
 										
 										<div class="img" style="background-image: url('.$image.'); "></div>
 										<div class="arrow-news"></div>
 										<div class="overlay-bg-item"></div>
 									</div>
 									
 									 

 									
 									<div class="item-text ">
 										<h2>'.get_the_title($post_id).'</h2>

 										<p>
 											'.my_string_limit_words($content,9).'
 										</p>
 									</div>
 									

 								</a>';


 							echo '</li>';

							
						endwhile;	


					 ?>
					 <a href="#" class="btn btn-link-more load-more">
					 	<img class="arrow-butt" src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> 
					 	<img class="loadmore-loader" src="<?php  echo get_theme_file_uri( '/assets/images/ajax-loader-cf.gif' ) ?>">
					 	Все Новости</a>
				 	</ul>

				</div>
				 




			</div>	

		</div>	

 	</section>
 

<?php get_footer();
