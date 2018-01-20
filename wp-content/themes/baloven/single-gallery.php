<?php
/* 
*
*
*/?>
<?php get_header(); ?>
 	<section >
 
		<div class="container">

			<div class="row padding-row">
				<h1 class="section-title">Галерея</h1>
 
					<ul class="banket single-gallery clearfix">
					<?php
							$thumb = $image = $img_url = '';

								    $post_id = get_the_ID();
							$files 	 = rwmb_meta( 'file_aw', $post_id );
				 			$regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
							foreach ($files as $key => $value) {
								 

								$match;

								if(preg_match($regex_pattern, $value, $match)){
									parse_str( parse_url( $value, PHP_URL_QUERY ), $my_array_of_vars );
					 
								   		//$value = str_replace("watch","embed",$value);
										$url = 'https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/0.jpg';
										 

								   $content ='<img src="'.esc_url( $url ).'"   />';
								 }else{
								 	$image   = aq_resize( $value, 480, 360, true ); 
								 	$content = '<img src="'.esc_url( $image ).'"   />';
								 }
								
								echo '<li> <a href="'.$value.'"   data-fancybox="images" >';
									 

									    echo $content;
									    
	 
								echo '</a></li> '; 
							} 


 

							/*
						<li>
							
							<a href="<?php  echo get_theme_file_uri( '/assets/images/8.jpg' ) ?>" data-lightbox="roadtrip"><img src="<?php  echo get_theme_file_uri( '/assets/images/8.jpg' ) ?>"></a>

						</li>

							*/
					?>

 
					 



					</ul>
			</div>	

		</div>	

 	</section>
 

<?php get_footer();
