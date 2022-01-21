<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	// parent theme styles
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	// custom css
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/firefly.css' );
	// fonts
	//wp_enqueue_style( 'custom-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Sanchez&display=swap');
	wp_enqueue_style( 'font-awesome',  get_stylesheet_directory_uri() . '/assets/css/fontawesome-all.min.css');

	// custom JS
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/firefly.js', ['jquery'], '1.0.1', true );
	//Vue
	//wp_enqueue_script( 'vue-js', 'https://unpkg.com/vue@next', null, null, true );

	
});


add_action( 'after_setup_theme', function() {
	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
	add_editor_style( 'assets/css/editor.css' ); // tries to include editor.css directly from your theme folder
});

/**
 * Append Form to post content
 */

add_filter('the_content', 'ff_post_append_content');

function ff_post_append_content($content) {

	// Check if we're inside the main loop in a single Post.
    if ( is_singular() && in_the_loop() && is_main_query() ) {
		$form = '[gravityform id="1"]';
		
		return $content . do_shortcode( $form );
    }
 
    return $content;
}

/**
 * SETUP CARBON FIELDS
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'post_meta', 'Individual Details' )
		->where( 'post_type', '=', 'post' )
		->set_context( 'side' )
		->add_fields([
			Field::make( 'text', 'ff_date', __( 'Date' ) ),
			Field::make( 'text', 'ff_state', __( 'State' ) ),
			Field::make( 'text', 'ff_age', __( 'Age' ) ),
			Field::make( 'text', 'ff_age_bracket', __( 'Age Bracket' ) ),
			Field::make( 'text', 'ff_gender', __( 'Gender' ) ),
			Field::make( 'text', 'ff_place', __( 'Place' ) ),
			Field::make( 'text', 'ff_transmission', __( 'Transmission Source' ) ),
			Field::make( 'text', 'ff_comorbidities', __( 'Co-morbidities' ) ),
			Field::make( 'text', 'ff_vaccination_status', __( 'Vaccination Status' ) ),

	]);
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}


