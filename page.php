<?php get_header(); ?>

<h1 class= page-title><?php the_title(); ?><h1>

<div class="page-container">

    <?php if(have_posts() ) : while(have_posts()) : the_post();?>
    <?php the_content();?>
    <?php endwhile; else: endif;?>
    

</div>
	
	<?php get_footer(); ?>