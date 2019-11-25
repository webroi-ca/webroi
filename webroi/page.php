<?php get_header();?>
<!-- single page banner area -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6">
        
				<?php if(get_post_meta(get_the_ID(), 'heading', true)){ $heading = get_post_meta(get_the_ID(), 'heading', true);
						}else{ $heading = get_the_title();} ?>
				
                    <h1><?php echo $heading; ?></h1>
                
			
        </div>
    </div>
</div>
<!-- single page banner ends here -->

<!-- Body content loop -->
<main id="content">
<?php if(have_posts()): while(have_posts()): the_post();?>
<!-- here you can write your html code -->

<?php the_content(); ?>

	
<?php endwhile;endif;?>
</main>
<!-- end of body content loop -->
<?php get_footer();?>