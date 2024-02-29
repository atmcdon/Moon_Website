<?php
/*
Template Name: Gallery Page*/
?>

<?php get_header(); ?>


<div class = gallery-page>
	<h1>Gallery</h1>

	<?php
	$args = array(
		'post_type' => 'product',
		'product_cat' => 'Gallery', // Adjust the tag slug as necessary
		'posts_per_page' => -1, // Retrieve all products
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) : ?>
		<div class="gallery-page-gallery">
			<?php while ($query->have_posts()): $query->the_post(); ?>
				<!-- Display product image -->
				<div class="gallery-page-images">
					<?php the_post_thumbnail('medium'); ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>No custom order products found.</p>
	<?php endif;
	wp_reset_postdata();
	?>
</div>
	<?php get_footer(); ?>
	