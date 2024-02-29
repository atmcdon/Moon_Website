<?php get_header(); ?>

<!-- Title Section (Commented Out) -->

<!-- Display WooCommerce Shop Listings -->

<div class="content">
		<div class= woo-shop-container>
			<!-- <h1><?php the_title(); ?><h1> -->
		</div>
		<h1>Shop</h1>
		<div class =shop-page-h3>
			<h3> Welcome to our virtual booth, traveler! Here you will find all our items currently up for grabs. Check out our <a href="https://mooncatmagpie.azurewebsites.net/gallery/">gallery</a> and <a href="https://mooncatmagpie.azurewebsites.net/custom-order/">custom orders</a> page for more inspiration and to place a special request!</h3>
		</div>

		<section class="shop-listings">
			<h2>Products</h2>
			<div class="products-by-category">
				
				<div class="category-buttons">
					<?php 
					//finds and exludes catagorys from being displayed.
					$exclude_category_names = array('All', 'Gallery', 'Custom Order'); // The names of the categories you want to exclude
					$exclude_category_ids = array();

					foreach($exclude_category_names as $category_name) {
						$term = get_term_by('name', $category_name, 'product_cat');
						if ($term) {
							$exclude_category_ids[] = $term->term_id;
						}
					}
					
					
					
					
					$categories = get_terms('product_cat', array('hide_empty' => true,'exclude' => $exclude_category_ids));
					foreach ($categories as $category) : ?>
						<a href="#cat-<?php echo esc_attr($category->term_id); ?>" class="button">
							<?php echo esc_html($category->name); ?>
						</a>
					<?php endforeach; ?>
				</div>




				<?php 




				$categories = get_terms('product_cat', array('hide_empty' => true,'exclude' => $exclude_category_ids));
				foreach ($categories as $category) : ?>
					<div class="category-section">

					<section id="cat-<?php echo esc_attr($category->term_id); ?>" class="category-section">
						<h2><?php echo esc_html($category->name); ?></h2>

						<div class="products-gallery">
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1, // Set to -1 to show all products
								'posts_per_page' => 100, // Adjust the number of products to display
								'stock_status' => 'instock', // Show in-stock items
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field' => 'term_id',
										'terms' => $category->term_id,
									),
								),
							);
							$products_query = new WP_Query($args);


							if($products_query->have_posts()) :
								while($products_query->have_posts()) : $products_query->the_post();
									global $product;?>
									<div class="product" 

											data-product-id="<?php get_the_ID(); ?>"
											data-product-title="<?php echo get_the_title(); ?>"
											data-product-price="<?php echo esc_attr($product->get_price_html()); ?>"
											data-product-description="<?php echo the_content(); ?>"
											data-product-image-url="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" 
											data-product-url="<?php echo $product->add_to_cart_url(); ?>"
											data-product-gallery-urls='<?php echo json_encode(array_map(function($id) { return wp_get_attachment_url($id); }, $product->get_gallery_image_ids())); ?>'>            
												<?php if(has_post_thumbnail()): ?>
													<div class="product-image">
														<?php the_post_thumbnail('woocommerce_thumbnail'); ?> 
													</div>
												<?php endif; ?>

												<h3><?php the_title(); ?></h3>
												<div class="product-price"><?php echo $product->get_price_html(); ?></div>


												<div> <?php echo the_content(); ?> 
											</div>
										<br>
										<a href="https://www.facebook.com/mooncatandmagpie" class="button_add_to_cart_button">Buy on Facebook</a> 
<!-- 												<a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>" class="button_add_to_cart_button">Add to Cart</a> -->
										</div>
									<?php
								endwhile;
							else :
								echo '<p>No products found in this category.</p>';
							endif;
							wp_reset_postdata();
							?>
						</div>
						</section>
					</div>
				<?php endforeach; ?>
			</div>


		</section>
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script>
		document.addEventListener('DOMContentLoaded', () => {
			const products = document.querySelectorAll('.product');

			products.forEach(product => {
				product.addEventListener('click', function() {
					const swiperContainer = document.querySelector('.swiper-container');
					const title = this.getAttribute('data-product-title');
					const price = this.getAttribute('data-product-price');
					const description = this.getAttribute('data-product-description');
					const imageUrl = this.getAttribute('data-product-image-url');
					const productUrl = this.getAttribute('data-product-url');
					const galleryUrls = JSON.parse(this.getAttribute('data-product-gallery-urls') || '[]');

					// <img src="${imageUrl}" alt="${title}">

					// console.log(title, price, description, imageUrl, productUrl);

					//  overlay content using the data attributes
					const overlay = document.createElement('div');
					overlay.id = 'productOverlay';
					let galleryHtml = '<div class="swiper-container"><div class="swiper-wrapper">';

					// Include the main image and gallery images in the slider
					galleryHtml += `<div class="swiper-slide"><img src="${imageUrl}" alt="Main Image"></div>`;
					galleryUrls.forEach(url => {
						galleryHtml += `<div class="swiper-slide"><img src="${url}" alt="Gallery Image"></div>`;
					});
					galleryHtml += '</div><div class="swiper-pagination"></div>';
					galleryHtml += '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div></div>';

					overlay.innerHTML = `
						<div class="overlay-content">
							<span class="close-btn">&times;</span>
							${galleryHtml}

							<h3>${title}</h3>
							<p>${description}</p>
							<p>${price}</p>
							<a href="https://www.facebook.com/mooncatandmagpie" class="add-to-cart-btn">Buy on Facebook</a> 
						<!--<a href="${productUrl}" class="add-to-cart-btn">Add to Cart</a>-->
							<!-- More buttons can be added here -->
						</div>
					`;
					document.body.appendChild(overlay);
					new Swiper('.swiper-container', {
						slidesPerView: 1,
						loop: true,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},




						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
					});
					// Close the overlay
					overlay.querySelector('.close-btn').addEventListener('click', () => {
						overlay.remove();
					});
				});
			});
		});


		</script>

		<!-- This will impliment smooth scrolling -->
		<script>
		jQuery(document).ready(function($) {
			$('a[href*="#cat-"]').on('click', function(e) {
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $($(this).attr('href')).offset().top
				}, 500);
			});
		});
		</script>
</div>
		<?php get_footer(); ?>