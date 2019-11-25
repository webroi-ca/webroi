<?php get_header();?>
<div class="container-fluid">
    <div class="row">
        <div class="cl-lg-12">
        <h1><?php 
					if(is_category()){
						echo get_the_category()[0]->cat_name;
					}else{
						echo "Blog";
					}
                ?>
        </h1>
        </div>
    </div>
</div>

<!-- body content loop -->
<main id="content">
<?php if(have_posts()): while(have_posts()): the_post();?>
<a href="<?php the_permalink(); ?>">
    <h2><?php the_title();?></h2>
    <p><?php the_excerpt(); ?></p>
</a>
<?php endwhile;endif;?>
</main>
<!-- end of body loop -->
<?php get_footer();?>