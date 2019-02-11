<?php
/* 
*
*Template Name: Галерея
*
*/ ?>
<?php get_header(); ?>
    <section>

        <div class="container">

            <div class="row padding-row">
                <h1 class="section-title">Галерея</h1>
                <div class="filter-class">
                    <a href="#" class="link-filter-gallery current">Фото</a>
                    <a href="#" class="link-filter-gallery">Видео</a>
                </div>

                <div>
                    <ul class="list-gallery gallery-video-cat  page-gallery clearfix">
                        <?php


                        $thumb = $image = $img_url = '';
                        $i = 0;
                        $args = array(
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_gallery',
                                    'field' => 'slug',
                                    'terms' => 'video'
                                )
                            ),
                            'post_type' => 'gallery'
                        );
                        $the_query_gallery = new WP_Query($args);
                        while ($the_query_gallery->have_posts()) :
                            $the_query_gallery->the_post();
                            $post_id_video = $the_query_gallery->post->ID;
                            $files = rwmb_meta('file_aw', $post_id_video);

                            echo '	<li class="item animation-block  opacity-zero" data-animation="fadeInUp">
											';
                            $video = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"343\" height=\"230\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $files[0]);

                            echo $video;
                            echo '		
										</li>';


                            $i++;
                        endwhile;


                        ?>

                    </ul>
                    <ul class="list-gallery  page-gallery  gallery-images-cat clearfix">
                        <?php


                        $thumb = $image = $img_url = '';
                        $i = 0;
                        $args2 = array(
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_gallery',
                                    'field' => 'slug',
                                    'terms' => 'images'
                                )
                            ),
                            'post_type' => 'gallery'
                        );
                        $the_query_gallery = new WP_Query($args2);
                        while ($the_query_gallery->have_posts()) :
                            $the_query_gallery->the_post();
                            $post_id_gallery = $the_query_gallery->post->ID;

                            $thumb_event = rwmb_meta('thumb_event', array('limit' => 1), $post_id_gallery);
                            $thumb_event = reset($thumb_event);
                            $redydate = rwmb_meta('date_event', $post_id_gallery);
                            $redytitle = rwmb_meta('name_event', array('limit' => 1), $post_id_gallery);

                            $image = aq_resize($thumb_event['full_url'], 545, 364, true);

                            echo '	<li class="item animation-block  opacity-zero" data-animation="fadeInUp">
											';
                            if ($image) :
                                echo '
												<div class="over-img-gal">

												<img src="' . esc_url($image) . '">
													
												<div class="gallery-text">
												<div class="bre-holder">
												<div class="bre-holder-inc">
													<div class="bre-inler">
													<h6>' . date("d.m.Y", strtotime($redydate)) . '</h6>
													<h4>' . $redytitle . '</h4>
													<a href="' . get_permalink($post_id_gallery) . '"  ></a>

												</div>
												</div>
												</div>
												</div>
												

												</div>

												';
                            else :
                                echo '<a href="' . get_permalink($post_id_gallery) . '"  ><span></span><img src="' . get_theme_file_uri("/assets/images/gallery.jpg ") . '></a>';

                            endif;
                            echo '		
										</li>';


                            $i++;
                        endwhile;


                        ?>

                    </ul>
                </div>


            </div>

        </div>

    </section>


<?php get_footer();
