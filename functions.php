<?php
/**
 * meal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meal
 */

if ( ! function_exists( 'meal_one_page_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function meal_one_page_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on meal, use a find and replace
		 * to change 'meal-one-page' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'meal-one-page', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'meal-one-page' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'meal_one_page_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'meal_one_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meal_one_page_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'meal_one_page_content_width', 640 );
}
add_action( 'after_setup_theme', 'meal_one_page_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meal_one_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'meal-one-page' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'meal-one-page' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'meal_one_page_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meal_one_page_scripts() {
	
	wp_enqueue_style( 'meal-one-page-font', '//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700');

	wp_enqueue_style( 'meal-one-page-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'meal-one-page-animated', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'meal-one-page-carosel', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style( 'meal-one-page-popup', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style( 'meal-one-page-aos', get_template_directory_uri() . '/css/aos.css');
	wp_enqueue_style( 'meal-one-page-datepicker', get_template_directory_uri() . '/css/bootstrap-datepicker.css');
	wp_enqueue_style( 'meal-one-page-timepicker', get_template_directory_uri() . '/css/jquery.timepicker.css');
	wp_enqueue_style( 'meal-one-page-ionicons', get_template_directory_uri() . '/fonts/ionicons/css/ionicons.min.csss');
	wp_enqueue_style( 'meal-one-page-font-awesome', get_template_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css');
	wp_enqueue_style( 'meal-one-page-flaticon', get_template_directory_uri() . '/fonts/flaticon/font/flaticon.css');
	wp_enqueue_style( 'meal-one-page-portfolio', get_template_directory_uri() . '/css/portfolio.css');
	wp_enqueue_style( 'meal-one-page-style-css', get_template_directory_uri() . '/css/style.css');

	wp_enqueue_style( 'meal-one-page-main-style', get_stylesheet_uri() );


	wp_enqueue_script( 'meal-one-page-jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-migrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.1.min.js', array('meal-one-page-jquery'), '20151215', true );

	wp_enqueue_script( 'meal-one-page-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',  array('meal-one-page-jquery'), '20151215', true );

	wp_enqueue_script( 'meal-one-page-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('meal-one-page-jquery'), '20151215', true );

	wp_enqueue_script( 'meal-one-page-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-datepicker-js', get_template_directory_uri() . '/js/bootstrap-datepicker.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-timepicker-js', get_template_directory_uri() . '/js/jquery.timepicker.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-aos-js', get_template_directory_uri() . '/js/aos.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-googleapis-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-portfolio-js', get_template_directory_uri() . '/js/portfolio.js', array(), '20151215', true );

	wp_enqueue_script( 'meal-one-page-main-js', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	// LOad Reservation 
	wp_enqueue_script( 'meal-one-page-reservation-js', get_template_directory_uri() . '/js/reservation.js', array('meal-one-page-jquery'), '20151215', true );
 // Getting Ajax URL
    $ajaxurl = admin_url('admin-ajax.php');

 //Localize Script for pass Ajax URL
 wp_localize_script( "meal-one-page-reservation-js","mealurl",array("ajaxurl" => $ajaxurl));

	wp_enqueue_script( 'meal-one-page-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meal_one_page_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Meal Reservation 

function meal_process_reservation() {

	if ( check_ajax_referer( 'reservation', 'rn' ) ) {
		$name    = sanitize_text_field( $_POST['name'] );
		$email   = sanitize_text_field( $_POST['email'] );
		$persons = sanitize_text_field( $_POST['persons'] );
		$phone   = sanitize_text_field( $_POST['phone'] );
		$date    = sanitize_text_field( $_POST['date'] );
		$time    = sanitize_text_field( $_POST['time'] );

		$data = array(
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'persons' => $persons,
			'date'    => $date,
			'time'    => $time
		);
		//print_r( $data );

		$reservation_arguments = array(
			'post_type'   => 'reservation',
			'post_author' => 1,
			'post_date'   => date( 'Y-m-d H:i:s' ),
			'post_status' => 'publish',
			'post_title'  => sprintf( '%s - Reservation for %s persons on %s - %s', $name, $persons, $date . " : " . $time, $email ),
			'meta_input'  => $data
		);

		$reservations = new WP_Query( array(
			'post_type'   => 'reservation',
			'post_status' => 'publish',
			'meta_query'  => array(
				'relation'    => 'AND',
				'email_check' => array(
					'key'   => 'email',
					'value' => $email
				),
				'date_check'  => array(
					'key'   => 'date',
					'value' => $date
				),
				'time_check'  => array(
					'key'   => 'time',
					'value' => $time
				),
			)
		) );
		if ( $reservations->found_posts > 0 ) {
			echo 'Duplicate';
		} else {
			$wp_error = '';
			wp_insert_post( $reservation_arguments, $wp_error );
			if ( ! $wp_error ) {
				echo "Successful";
			}
		}

	} else {
		echo 'Not allowed';
	}
	die();
}

add_action( 'wp_ajax_reservation', 'meal_process_reservation' );
add_action( 'wp_ajax_nopriv_reservation', 'meal_process_reservation' );













































// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$prefix = 'my_framework';
  
	//
	// Create options
	CSF::createOptions( $prefix, array(
	  'menu_title' => 'My Framework',
	  'menu_slug'  => 'my-framework',
	) );
  
	//
	// Create a section
	CSF::createSection( $prefix, array(
	  'title'  => 'Tab Title 1',
	  'fields' => array(
  
		//
		// A text field
		array(
		  'id'    => 'opt-text',
		  'type'  => 'text',
		  'title' => 'Simple Text',
		),
		array(
			'id'    => 'opt-wp-editor-1',
			'type'  => 'wp_editor',
			'title' => 'WP Editor',
		  ),
		  array(
			'id'    => 'opt-typography-1',
			'type'  => 'typography',
			'title' => 'Typography',
		  ),
		  array(
			'id'            => 'opt-tabbed-1',
			'type'          => 'tabbed',
			'title'         => 'Tabbed',
			'tabs'          => array(
			  array(
				'title'     => 'Tab 1',
				'icon'      => 'fa fa-heart',
				'fields'    => array(
				  array(
					'id'    => 'opt-text-1',
					'type'  => 'text',
					'title' => 'Text',
				  ),
				)
			  ),
			  array(
				'title'     => 'Tab 2',
				'icon'      => 'fa fa-gear',
				'fields'    => array(
				  array(
					'id'    => 'opt-color-1',
					'type'  => 'color',
					'title' => 'Color',
				  ),
				)
			  ),
			)
		  ),
		  array(
			'id'            => 'opt-tabbed-2',
			'type'          => 'tabbed',
			'title'         => 'Tabbed',
			'tabs'          => array(
			  array(
				'title'     => 'Tab 1',
				'icon'      => 'fa fa-heart',
				'fields'    => array(
				  array(
					'id'    => 'opt-text-1',
					'type'  => 'text',
					'title' => 'Text 1',
				  ),
				  array(
					'id'    => 'opt-text-2',
					'type'  => 'text',
					'title' => 'Text 2',
				  ),
				)
			  ),
			  array(
				'title'     => 'Tab 2',
				'icon'      => 'fa fa-star',
				'fields'    => array(
				  array(
					'id'    => 'opt-color-1',
					'type'  => 'color',
					'title' => 'Color 1',
				  ),
				  array(
					'id'    => 'opt-color-2',
					'type'  => 'color',
					'title' => 'Color 2',
				  ),
				)
			  ),
			),
			'default'       => array(
			  'opt-text-1'  => 'This is text 1 value',
			  'opt-text-2'  => 'This is text 2 value',
			  'opt-color-1' => '#555',
			  'opt-color-2' => '#999',
			)
		  ),
		  array(
			'id'        => 'opt-sportable-1',
			'type'      => 'sortable',
			'title'     => 'Sortable',
			'fields'    => array(
		  
			  array(
				'id'    => 'text-1',
				'type'  => 'text',
				'title' => 'Text 1'
			  ),
		  
			  array(
				'id'    => 'text-2',
				'type'  => 'text',
				'title' => 'Text 2'
			  ),
		  
			),
		  ),
		  array(
			'id'    => 'opt-slider-1',
			'type'  => 'slider',
			'title' => 'Slider',
		  ),
		  array(
			'id'          => 'opt-select-1',
			'type'        => 'select',
			'title'       => 'Select',
			'placeholder' => 'Select an option',
			'options'     => array(
			  'option-1'  => 'Option 1',
			  'option-2'  => 'Option 2',
			  'option-3'  => 'Option 3',
			),
			'default'     => 'option-2'
		  ),
		  array(
			'id'     => 'opt-repeater-1',
			'type'   => 'repeater',
			'title'  => 'Repeater',
			'fields' => array(
		  
			  array(
				'id'    => 'opt-text',
				'type'  => 'text',
				'title' => 'Text'
			  ),
		  
			),
		  ),
	  )
	) );
  
	//
	// Create a section
	CSF::createSection( $prefix, array(
	  'title'  => 'Tab Title 2',
	  'fields' => array(
  
		// A textarea field
		array(
		  'id'    => 'opt-textarea',
		  'type'  => 'textarea',
		  'title' => 'Simple Textarea',
		),
  
	  )
	) );
  
  }
