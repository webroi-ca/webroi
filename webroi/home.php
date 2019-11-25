<?php 
/*
*Template name : Home Page
*/
?>
<?php get_header();?>

<!-- body loop area -->
<div id="content">
<?php if(have_posts()): while(have_posts()): the_post();?>
<!-- here you can write your html code  -->
	
<?php endwhile;endif;?>
</div>
<!-- end of body loop -->

<?php get_footer();?>