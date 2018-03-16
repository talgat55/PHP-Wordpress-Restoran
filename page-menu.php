<?php
/* 
*
*Template Name: Страница Меню 
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row page-menu">
				<h1 class="section-title">Меню</h1>

				<div class="row-carousel menu-part-walp menu-cat-height" style="position: relative;">
				<div class="  owl-carousel owl-theme  menucat-list">

					<?php 

								$args2 = array(
								'posts_per_page'   => -1,
								'post_type'        => 'menucat'
								);
							$the_query = new WP_Query($args2);
						 
							while( $the_query->have_posts() ) :
								$the_query->the_post();
								$post_id = $the_query->post->ID; 
								 
								$img_url = wp_get_attachment_url(get_post_thumbnail_id($post_id,'full'));
								$image   = aq_resize( $img_url, 210, 174, true );
								$files 	 = rwmb_meta( 'file_aw', $post_id );


						  
								echo '<div>
										<div class="menu-cat-walp">
										<h4>'.get_the_title($post_id).'</h4>
											<div class="menu-cat-img-overlay">

												<a  target="_blank" href="'.$files.'">
													<img  class="animation-block img-block-icon opacity-zero" data-animation="zoomIn" src="'.$image.'">
												</a>	
											</div>
											';
											 

								echo '
											<p><a class="href-menu-view"  target="_blank"  href="'.$files.'">Посмотреть</a></p>
											
										</div>
									</div>';

								endwhile;
								?>
					


				</div>
				 <a href="#" class="menu-carousel-arrow-left"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-l.jpg' ) ?>"></a>
					<a href="#" class="menu-carousel-arrow-right"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-r.jpg' ) ?>"></a>
				</div>
				<?php
				while ( have_posts() ) : the_post();
				

				echo '<h1 class="section-title">'.get_the_title(get_the_ID()).'</h1>';


				endwhile;

				?>
				 <div class="row-carousel menu-part-walp"  style="position: relative;">
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

								    echo ' <a href="'.$img_url.'"   data-fancybox="images" ><img class="img-border" src="'.esc_url( $image ).'"   /></a>';
								   /* <img src="<?php  echo get_theme_file_uri( '/assets/images/menu.jpg' ) ?>">*/

								 endif;  

								 echo '<div class="title-menu-walp"><h3>'.get_the_title($post_id_menu).'</h3></div>';
								 echo '<p class="text-menu">'.get_the_content($post_id_menu).'</p>';
								 echo '<span class="border-bottom-menu"></span>';
								 echo '<div class="price">'.get_post_meta($post_id_menu, 'my_meta_price', true).'<img  src="'.get_theme_file_uri( '/assets/images/ruble.png' ).'"></div>';
							echo '</div>'; 

							endwhile;
					?>
  
				</div>
				
					<a href="#" class="menu-carousel-arrow-left"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-l.jpg' ) ?>"></a>
					<a href="#" class="menu-carousel-arrow-right"><img src="<?php  echo get_theme_file_uri( '/assets/images/a-r.jpg' ) ?>"></a>
				</div>

			</div>	

		</div>	

 	</section>
 

<?php get_footer();
