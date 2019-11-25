<?php get_header();?>

<!-- body loop area -->
<div id="content">
<?php if(have_posts()): while(have_posts()): the_post();?>
<!-- here you can write your html code  -->
	
<?php endwhile;endif;?>
</div>
<!-- end of body loop -->

<!-- Code for Pagination , Use proper container(container or container-fliud) class to wrap it -->
<?php numeric_posts_nav(); ?>				
<!-- End of Pagination  -->

<?php get_footer();?>