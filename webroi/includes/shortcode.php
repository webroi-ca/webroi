<?php 
add_shortcode( 'template_dir', function(){
    return get_template_directory_uri();
});
add_filter( 'widget_text', 'do_shortcode' ); 

/*calling theme mod*/
function get_theme_mod_data($attr){
   $theme_mod_name = $attr['name'];
   if(get_theme_mod($theme_mod_name)){
        return get_theme_mod($theme_mod_name);
   }else{
    return "No theme mod Data found!";
   }
}
add_shortcode('give_theme_mod_data','get_theme_mod_data');


// Shortcode for youtbe 

add_shortcode('please_youtube',function($video_id){
    $id = $video_id["id"];
   return '<div class="youtube" data-embed="' . $id . '"> <div class="play-button"></div></div>';
});