<?php 
/*
* Require Image resize
*/

include_once('inc/aq_resizer.php');

/*
* Include meta box
*/
include_once('inc/meta-box.php');
include_once('inc/meta-box/meta-box.php');
 
/*
* Admin 
*/ 
/*
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/redux/options-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/options-config.php' );
}

/*
* Redux hook
*/
/*
function get_theme_options() {
 
	$current_options = get_option('redux');
	//use new options
	if(!empty($current_options)) {
		return $current_options;
	}  
}  */
/*
* Add Feature Imagee
**/
add_theme_support( 'post-thumbnails' );

/**
 * Enqueue scripts and styles.
 */
function th_scripts() { 
	// Theme stylesheet.
	wp_enqueue_style( 'th-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'normalize', get_theme_file_uri(  '/assets/css/normalize.css'),array(), '' );
	//wp_enqueue_style( 'light-style-main', get_theme_file_uri(  '/assets/css/index.css'),array(), '' );
	//wp_enqueue_style( 'font-awesome', get_theme_file_uri(  '/assets/css/font-awesome.min.css'),array(), '' );


	wp_enqueue_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway' ); 
	wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900' ); 

	wp_enqueue_style( 'owl-awesome', get_theme_file_uri(  '/assets/css/owl.carousel.css'),array(), '' );
	wp_enqueue_style( 'owl.theme.default.min', get_theme_file_uri(  '/assets/css/owl.theme.default.min.css'),array(), '' ); 
	wp_enqueue_style( 'slick-theme', get_theme_file_uri(  '/assets/css/slick-theme.css'),array(), '' ); 
	wp_enqueue_style( 'slick', get_theme_file_uri(  '/assets/css/slick.css'),array(), '' ); 
//	wp_enqueue_style( 'datepicker.min', get_theme_file_uri(  '/assets/css/datepicker.min.css'),array(), '' ); 
	wp_enqueue_style( 'jquery.fancybox.min', get_theme_file_uri(  '/assets/css/jquery.fancybox.min.css'),array(), '' ); 
	wp_enqueue_style( 'jquery-ui.min', get_theme_file_uri(  '/assets/css/jquery-ui.min.css'),array(), '' ); 
 
	wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/js/jquery-3.2.1.min.js' ), array(), '' );
	if( is_front_page() OR is_home()) { 
	
		wp_enqueue_script( 'instafeed', 'https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js',array(), '' ); 
		wp_enqueue_script( 'vk', 'https://vk.com/js/api/openapi.js?151',array(), '' ); 
	}
	if( is_front_page() OR is_home() OR is_page_template('page-contact.php')) { 
		wp_enqueue_script( 'yandex-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU',array(), '' ); 
	}
	
	wp_enqueue_script( 'default', get_theme_file_uri(  '/assets/js/default_js.js'),array(), '' ); 
	wp_enqueue_script( 'owl', get_theme_file_uri(  '/assets/js/owl.carousel.js'),array(), '' );   
 
	wp_enqueue_script( 'slick', get_theme_file_uri(  '/assets/js/slick.min.js'),array(), '' );  
	wp_enqueue_script( 'jquery.inputmask', get_theme_file_uri(  '/assets/js/jquery.inputmask.js'),array(), '' );  
	wp_enqueue_script( 'jquery.fancybox.min', get_theme_file_uri(  '/assets/js/jquery.fancybox.min.js'),array(), '' ); 
	

	wp_enqueue_script( 'appear', get_theme_file_uri(  '/assets/js/appear.js'),array(), '' );  
	 
//	wp_enqueue_script( 'datepicker.min', get_theme_file_uri(  '/assets/js/datepicker.min.js'),array(), '' );  
	wp_enqueue_script( 'jquery-ui.min', get_theme_file_uri(  '/assets/js/jquery-ui.min.js'),array(), '' ); 
	wp_enqueue_script( 'jquery-ui-timepicker-addon', get_theme_file_uri(  '/assets/js/jquery-ui-timepicker-addon.js'),array(), '' ); 

  
 global $wp_query;
	$args = array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'query' => $wp_query->query,
	);
  wp_enqueue_script( 'be-load-more', get_theme_file_uri(  '/assets/js/load-more.js'),array(), '' ); 
  wp_localize_script( 'be-load-more', 'beloadmore', $args );
 
	 
}
add_action( 'wp_enqueue_scripts', 'th_scripts' );

function my_enqueue() {
 
    wp_enqueue_script( 'admin', get_theme_file_uri(  '/assets/js/admin.js'),array(), '' ); 
    wp_enqueue_style( 'style', get_theme_file_uri(  '/assets/css/admin.css'),array(), '' );
}

add_action('admin_enqueue_scripts', 'my_enqueue');


/*
* Register nav menu
*/
if ( function_exists( 'register_nav_menus' ) ) {
 
		$menu_arr = array(
		  'main_menu' => 'Меню' 
		);
	 
	
	register_nav_menus($menu_arr);
}
/*
*  Rgister Post Type Banket
*/
	  
add_action( 'init', 'post_type_banket' );  
 
function post_type_banket() {
	$labels = array(
		'name' => 'Банкетный Зал', // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "banket",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('banket',$args);
} 

/*
*  Rgister Post Type Vacancy
*/
	  
add_action( 'init', 'post_type_vacancy' );  
 
function post_type_vacancy() {
	$labels = array(
		'name' => 'Вакансии', // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "vacancy",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('vacancy',$args);
} 




/*
*  Rgister Post Type Menu
*/
	  
add_action( 'init', 'post_type_slider' );  
 
function post_type_slider() {
	$labels = array(
		'name' => 'Слайдер',
		'singular_name' => 'Слайдер',   
		'all_items' => 'Слайдер',  
		'menu_name' => 'Слайдер' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "slider",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('slider',$args);
} 

/*
*  Rgister Post Type Menu
*/
	  
add_action( 'init', 'post_type_main_menu' );  
 
function post_type_main_menu() {
	$labels = array(
		'name' => 'Меню',
		'singular_name' => 'Меню',  
		'add_new' => 'Добавить Меню',
		'add_new_item' => 'Добавить Блюдо', // заголовок тега <title>
		'edit_item' => 'Редактировать Блюдо',
		'new_item' => 'Новое Блюдо',
		'all_items' => 'Меню',  
		'menu_name' => 'Меню' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "menu",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('menu',$args);
} 

/*
*  Rgister Post Type Gallery
*/
	  
add_action( 'init', 'post_type_main_gallery' );  
 
function post_type_main_gallery() {
	$labels = array(
		'name' => 'Галерея' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "gallery",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('gallery',$args);
} 
/*
*  Rgister Post Type Action
*/
	  
add_action( 'init', 'post_type_main_action' );  
 
function post_type_main_action() {
	$labels = array(
		'name' => 'Акции' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "action",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('action',$args);
} 
/*
*  Rgister Post Type Action
*/
	  
add_action( 'init', 'post_type_main_menucat' );  
 
function post_type_main_menucat() {
	$labels = array(
		'name' => 'Категории Меню' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить 
		'menu_position' => 5,
		'has_archive' => true,
		'query_var' => "menucat",
		'supports'  => array(
						'title',
						'editor',
						'thumbnail'
		),
		'taxonomies' => array('category')
	);
	register_post_type('menucat',$args);
} 


add_filter( 'rwmb_meta_boxes', 'your_prefix_file_demo' );
function your_prefix_file_demo( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'         => 'gallery-admin',
		'title'  => __( 'Дополнительные поля', 'your-prefix' ),
		'post_types' =>'gallery',
		'fields' => array(
			array(
				'id'               => 'date_event',
				'name'             => __( 'Дата Мероприятия', 'your-prefix' ),
				'type'             => 'date',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,  
			),			
			array(
				'id'               => 'name_event',
				'name'             => __( 'Название Мероприятия', 'your-prefix' ),
				'type'             => 'text',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,  
			),			
			array(
				'id'               => 'thumb_event',
				'name'             => __( 'Обложка Мероприятия', 'your-prefix' ),
				'type'             => 'image_advanced',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false, 
				'max_file_uploads' => 1, 
			),
			array(
			    'name' 				=> 'Показывать на главной</br> странице',
			    'id'   				=> 'check_shhow',
			    'type' 				=> 'checkbox',
			    'std'  				=> 0, // 0 or 1
			),
			 array(
				'id'               => 'file_aw',
				'name'             => __( 'Файл', 'your-prefix' ),
				'type'             => 'file_input',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,
				'clone'  			=>  true,  
			),

		),
	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'your_prefix_file_demo2' );
function your_prefix_file_demo2( $meta_boxes )
{
	$meta_boxes[] = array(
		'title'  => __( 'Дополнительные поля', 'your-prefix' ),
		'post_types' =>'banket',
		'fields' => array(
			 
			 array(
				'id'               => 'file_upload',
				'name'             => __( 'Изображение', 'your-prefix' ),
				'type'             => 'file_input',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,
				'clone'  			=>  true,
				// Maximum file uploads 
			),

		),
	);
	return $meta_boxes;
}
 add_filter( 'rwmb_meta_boxes', 'your_prefix_file_demo3' );
function your_prefix_file_demo3( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'         => 'standard-sa',
		'title'  => __( 'Дополнительные поля', 'your-prefix' ),
		'post_types' =>'menucat',
		'fields' => array(
		 			
		 
			 array(
				'id'               => 'file_aw',
				'name'             => __( 'Файлы', 'your-prefix' ),
				'type'             => 'file_input',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false,
				'clone'  			=>  false,
				// Maximum file uploads
				'max_file_uploads' => 3,
			),

		),
	);
	return $meta_boxes;
}
 add_filter( 'rwmb_meta_boxes', 'your_prefix_file_demo4' );
function your_prefix_file_demo4( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'         => 'standard',
		'title'  => __( 'Дополнительные поля', 'your-prefix' ),
		'post_types' =>'page',
		'fields' => array(
		 			
		 
			 array(
				'id'               => 'file_busines',
				'name'             => __( 'Файл', 'your-prefix' ),
				'desc'             => __( 'Файл кнопки "Бизнес-ланч"', 'your-prefix' ),
				'type'             => 'file_input',
				// Delete file from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same file for multiple posts
				'force_delete'     => false, 
				// Maximum file uploads
				'max_file_uploads' => 1,
			),

		),
	);
	return $meta_boxes;
}
  add_filter( 'rwmb_meta_boxes', 'your_prefix_file_demo5' );
function your_prefix_file_demo5( $meta_boxes )
{
	$meta_boxes[] = array(
		'id'         => 'slider',
		'title'  => __( 'Дополнительные поля', 'your-prefix' ),
		'post_types' =>'slider',
		'fields' => array(
		 			
		 
			 array(
				'id'               => 'link-meta',
				'name'             => __( 'Ссылка', 'your-prefix' ), 
				'type'             => 'text', 
			),

		),
	);
	return $meta_boxes;
}
 

/*
* Custom excerpt
*/
function my_string_limit_words($string, $word_limit){
		$words = explode(' ', $string, ($word_limit + 1));
		if( count($words) > $word_limit )
			array_pop($words);
	//	return implode(' ', $words).'... ';
		return implode(' ', $words).'';
} 


/**
 * AJAX Load More 
 * @link http://www.billerickson.net/infinite-scroll-in-wordpress
 */

function be_ajax_load_more() {
	$args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
	//$args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
	$args['post_type'] =$_POST['query'];
	$args['paged'] = esc_attr( $_POST['page'] );
	$args['post_status'] = 'publish';
	ob_start();
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
		be_post_summary($_POST['query']);
	endwhile; endif; 
	wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}
add_action( 'wp_ajax_be_ajax_load_more', 'be_ajax_load_more' );
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more' );


function be_post_summary($type) {

							$img_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),'full');
							$image   = aq_resize( $img_url, 853, 853, true );

 							echo '<li class="clearfix">';
 							$after = '';
 							if($type == 'action'){

 								echo '<div class="item-list-wallpapers">';
 								$after = true;
 								// <div class="item-text animation-block  opacity-zero " data-animation="slideInUp">
 							}else{

 								echo '<a href="'.get_permalink(get_the_ID()).'" class="item-list-wallpapers">';
 								$after = false;
 							}
 							

 							echo '
 									<div class="item-img">
 										
 										<div class="img" style="background-image: url('.$image.'); "></div>
 										<div class="arrow-news"></div>
 										<div class="overlay-bg-item"></div>
 									</div>
 									
 									 

 									
 									<div class="item-text ">
 										<h2>'.get_the_title(get_the_ID()).'</h2>

 										<p>
 											'.my_string_limit_words(get_the_content(get_the_ID()),9).'
 										</p>
 									</div>';
 							if($after){

 								echo '</div>';
 							}else{

 								echo '</a>';

 							}
 							
 							


 							echo '</li>';


}