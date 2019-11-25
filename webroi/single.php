<?php get_header();?>
<!-- single page banner area -->
<div class="conatiner-fluid py-4">
    <div class="row">
        <div class="col-lg-6">
				<?php if(get_post_meta(get_the_ID(), 'heading', true)){ $heading = get_post_meta(get_the_ID(), 'heading', true);
						}else{ $heading = get_the_title();} ?>
				
                    <h1><?php echo $heading; ?></h1>
        </div>
        <div class="col-lg-6">
        </div>
    </div>
</div>
<!-- single page banner ends here -->


<!-- content loop -->
<main id="content">
<?php if(have_posts()): while(have_posts()): the_post();?>
<!-- Code here for content -->
    <php the_content(); ?>
<!-- content ends -->
<?php endwhile;endif;?>
<!-- content loop ends -->
</main>
<!-- Pagination starts , Please remember to use proper container(container, container-fluid or anything) to wrpa it -->
<?php while(have_posts()): if(have_posts()): the_post();?>
<div class="container">
<div class="row py-5">
    <div class="col-6">
        <div class="navigation float-left"><?php if(get_next_post_link('%link','',false)){
            echo str_replace('<a', '<a class="btn"', get_next_post_link('%link','<span class="btn-text">Privous Post</span>',false)) ; 
        }?></div>
    </div>
    <div class="col-6">
        <div class="navigation float-right"><?php if(get_previous_post_link('%link','',false)){
            echo str_replace('<a', '<a class="btn"',get_previous_post_link('%link','<span class="btn-text">Next Post</span>',false)); 
        }
        ?></div>
    </div>
</div>
</div>
<?php endif; endwhile;?>
<!-- Pagination ends -->

<?php get_footer();?>