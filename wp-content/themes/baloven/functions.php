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

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/redux/options-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux/options-config.php' );
}
/*
* Redux hook
*/
function get_theme_options() {
 
	$current_options = get_option('redux');
	//use new options
	if(!empty($current_options)) {
		return $current_options;
	}  
}  
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
	wp_enqueue_style( 'jquery.fancybox.min', get_theme_file_uri(  '/assets/css/jquery.fancybox.min.css'),array(), '' ); 
	wp_enqueue_style( 'jquery-ui.min', get_theme_file_uri(  '/assets/css/jquery-ui.min.css'),array(), '' ); 
 
	wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/js/jquery-3.2.1.min.js' ), array(), '' );
	if( is_front_page() OR is_home()) { 
	wp_enqueue_script( 'yandex-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU',array(), '' ); 
	wp_enqueue_script( 'instafeed', 'https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js',array(), '' ); 
	wp_enqueue_script( 'vk', 'https://vk.com/js/api/openapi.js?151',array(), '' ); 
	}
	wp_enqueue_script( 'default', get_theme_file_uri(  '/assets/js/default_js.js'),array(), '' ); 
	wp_enqueue_script( 'owl', get_theme_file_uri(  '/assets/js/owl.carousel.js'),array(), '' );   
 
	wp_enqueue_script( 'slick', get_theme_file_uri(  '/assets/js/slick.min.js'),array(), '' );  
	wp_enqueue_script( 'jquery.inputmask', get_theme_file_uri(  '/assets/js/jquery.inputmask.js'),array(), '' );  
	wp_enqueue_script( 'jquery.fancybox.min', get_theme_file_uri(  '/assets/js/jquery.fancybox.min.js'),array(), '' ); 
	

	wp_enqueue_script( 'appear', get_theme_file_uri(  '/assets/js/appear.js'),array(), '' ); 
	wp_enqueue_script( 'jquery-ui.min', get_theme_file_uri(  '/assets/js/jquery-ui.min.js'),array(), '' ); 
	wp_enqueue_script( 'jquery-ui-timepicker-addon', get_theme_file_uri(  '/assets/js/jquery-ui-timepicker-addon.js'),array(), '' ); 

  
	 
}
add_action( 'wp_enqueue_scripts', 'th_scripts' );

function my_enqueue() {
 
    wp_enqueue_script( 'admin', get_theme_file_uri(  '/assets/js/admin.js'),array(), '' ); 
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
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
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
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
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
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
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
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
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
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-cart', // иконка корзины
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
		'id'         => 'standard',
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
				'clone'  			=>  true,
				// Maximum file uploads
				'max_file_uploads' => 3,
			),

		),
	);
	return $meta_boxes;
}
 