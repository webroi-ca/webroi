<?php 
/*Theme customizer*/
function wp_theme_customizer(){
     wp_enqueue_script( 'theme-customizer', get_template_directory_uri().'/js/theme-customizer.js', array('jquery'), false, true );
}
add_action( 'customize_preview_init', 'wp_theme_customizer' );

//adding theme support for logo
add_theme_support( 'custom-logo', array(
    'height'      => 58,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );