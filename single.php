
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row">
				<div class="clearfix">
				<a href="#" style="float: left; margin-top: 22px;" onclick="window.history.go(-1); return false;"><img style="margin-right: 15px;" src="<?php  echo get_theme_file_uri( '/assets/images/back-link.png' ) ?>">Вернуться к новостям</a>
				</div>
				<h1 class="section-title" style="padding-bottom: 33px;"><?php  echo get_the_title(get_the_ID()); ?></h1>

				<div class=" clearfix">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>					
					<div class="single-post-text"><?php  echo my_string_limit_words(get_the_content(get_the_ID()), 20); ?></div>
					<div class="content-single col-md-12" style="text-align: center;">

						<?php

						$thumb   = get_post_thumbnail_id(get_the_ID());
						$img_url = wp_get_attachment_url( $thumb,'full');
						$image   = aq_resize( $img_url, 750, 450, true );

						if($image){

							echo '<img   src="'.$image.'"/> ';

						}	else{

							echo '<img width="100%"  src="'.$img_url.'"/> ';
						}
						?>
						
  
						<div>
							<p class="meta-date-single"><?php echo get_the_date('d.m.y'); ?></p>
							<span class="border-bottom-news"></span>
						</div>
						<div class="single-content">
							<?php  echo do_shortcode(get_the_content(get_the_ID())); ?>
						</div> 
 
					</div>
  				<?php endwhile; endif; ?>
				</div>
				 




			</div>	

		</div>	

 	</section>
 

<?php get_footer();
