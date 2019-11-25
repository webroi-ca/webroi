<?php 

/*adding custom post type file*/
if(file_exists(get_template_directory().'/includes/post_type.php')){
	require_once get_template_directory().'/includes/post_type.php';
}
/*adding widget file*/
if(file_exists(get_template_directory().'/includes/widget.php')){
	require_once get_template_directory().'/includes/widget.php';
}
/*adding theme mod file*/
if(file_exists(get_template_directory().'/includes/theme_mod.php')){
	require_once get_template_directory().'/includes/theme_mod.php';
}
if(file_exists(get_template_directory().'/includes/shortcode.php')){
	require_once get_template_directory().'/includes/shortcode.php';
}
/*preventing wordpress not to genarate unwanted version info*/
remove_action( 'wp_head', 'wp_generator' ) ;
/*Disabling Windows Live Writer manifest file */
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
/*Disabling Really Simple Discovery service*/
remove_action( 'wp_head', 'rsd_link' ) ;
/*Disabling HTML in comment*/
add_filter( 'pre_comment_content', 'esc_html' );
/*Removing wordpress emoji js and css*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// disabling Gutenburg block librery
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
//adding theme support for tittle tag
add_theme_support( 'title-tag' );
//adding theme support for feature image 
add_theme_support('post-thumbnails');
set_post_thumbnail_size('full');
//adiding fav icon -- Please drop your fav icon inside image directory of theme
function add_fav_icon(){ ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" > 
<?php }
add_action( 'wp_head', 'add_fav_icon');
// adding css and js 
add_action( 'wp_enqueue_scripts', function(){
	/*css*/
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style('font-awesosme', get_template_directory_uri().'/css/font-awesome.min.css', array(), false, 'all' );
	wp_enqueue_style('main', get_template_directory_uri().'/css/style.css', array(), false, 'all' );
	/*js*/
	wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery-3.4.1.min.js', array(), false, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), false, true );
});
/*Adding primary menu*/
register_nav_menus( array('primary' => __( 'Primary Menu')));
/*Removing all widget titles start with "!" sign*/
function remove_all_widget_title($widget_title){
    if($widget_title){
        if($widget_title[0] == "!"){
            return null;
        }
        return $widget_title;
    }
}
add_filter('widget_title','remove_all_widget_title');
// Removing <p> from text widget, use html widget to use <p> tag
remove_filter('widget_text_content','wpautop');
// Removing <p> form pages
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

// this to remove wordpress's type attributes from js and css
add_filter('style_loader_tag', 'please_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'please_remove_type_attr', 10, 2);
function please_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

/*Pagination*/
function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation text-center"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active" ' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active" ' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

