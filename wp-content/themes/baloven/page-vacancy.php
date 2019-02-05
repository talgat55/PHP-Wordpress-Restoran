<?php
/* 
*
*Template Name: Вакансии
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row page-vacancy">
				<h1 class="section-title"><?php the_title(); ?></h1>

				<?php 
				while ( have_posts() ) : the_post();
				
						echo '<p class="describe-vacancy-main">'.get_the_content().'</p>';
				
				endwhile;

				?>
				<div class="clearfix">
					<?php


								$args = array(
								'post_type'        => 'vacancy'
								);
							$the_query = new WP_Query($args);
							while( $the_query->have_posts() ) :
								$the_query->the_post();
								$post_id = $the_query->post->ID; 
								$img_url = wp_get_attachment_image_url(  get_post_thumbnail_id($post_id),'full');
								$image   = aq_resize( $img_url, 128, 128, true );

							echo '

								<div class="col-md-6">
									<div class="vacancy-md">
									<img  class="animation-block img-block-icon opacity-zero" data-animation="zoomIn" src="'.$image.'"/>
									<div>
										<h3>'.get_the_title($post_id).'</h3>
										<p class="describe-text-vacancy">'.get_the_content($post_id).'</p>
										<span class="border-bottom-vacancy"></span>
									</div>
										<p class="text-medium">
											Отправьте нам на почту резюме.</br>
											Наш менеджер с вами свяжется
										</p>
										<p ><a href="mailto:baloven-omsk@mail.ru">baloven-omsk@mail.ru</a></p> 

									</div>
								</div>

							';	


							endwhile;

					?>

					  

			</div>	

		</div>	

 	</section>
 

<?php get_footer();
