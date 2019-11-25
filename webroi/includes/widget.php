<?php 
// Here goes all widget codes

/*Registering all widgets*/
function register_all_widgets(){
    $home_funnel = array(
    'name'=> __( 'Home funnel' ),
    'id'=>'one',
    'description'=>'This widget area for Home page funnel',
    'class'=>'',
    'before_widget'=>'',
    'after_widget'=>'',
    'before_title'=>'',
    'after_title'=>''
    );
    register_sidebar($home_funnel);

    $sidebar = array(
    'name'=> __( 'Side Bar' ),
    'id'=>'two',
    'description'=>'This widget area for Page Sidebar ',
    'class'=>'',
    'before_widget'=>'<div id="%1$s" class="widget %2$s mb-4">',
    'after_widget'=>'</div>',
    'before_title'=>'<h3 class="widgettitle">',
    'after_title'=>'</h3>'
    );
    register_sidebar($sidebar);
}
add_action('widgets_init','register_all_widgets');