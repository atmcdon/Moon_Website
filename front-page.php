<?php get_header(); ?>


<section class= "front-page-sections">
	<!-- <?php the_title(); ?> -->
	
    <!-- Display Events -->	
    <section class="events-sidebar">
        <h2>Upcoming Events</h2>
        <?php
        $events_query = new WP_Query(array(
            'category_name' => 'events', // Uses the slug the category
            'posts_per_page' => 5, // Adjusts the number of events to display
        ));
        if($events_query->have_posts()) :
             while($events_query->have_posts()) {
                 $events_query->the_post();
            ?>
            <div class="event">
            <a href="<?php echo get_permalink(get_page_by_path('events')); ?>">
                <h3><?php the_title(); ?></h3>
                
                <?php the_content(); ?>
                
                
                <!-- If there is a Thumb Nail to display then it will display it -->
                <?php if(has_post_thumbnail()): ?>
                    <div class="event-image">
                        
                            <?php the_post_thumbnail(); ?>
						
					</div>
                <?php endif; ?>
				</a>
					
			</div>
            <?php
              } else:
            echo '<p>No upcoming events found.</p>';
        endif;
        wp_reset_postdata(); // Reset post data to avoid conflicts
        ?>
        
    </section>

    <!-- Display WooCommerce Shop Listings -->
    <section class ="products-gallery-outer">
        <h2>Welcome to Mooncat & Magpie! <br> Handmade one-of-a-kind gifts with a literary and pop culture flair.</h2>
        <div class="products-gallery"> 
            <?php
            $shop_query = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 25, // Adjust the number of products to display
                'stock_status' => 'instock', // Show in-stock items
            ));

            if($shop_query->have_posts()) :
                while($shop_query->have_posts()) {
                    $shop_query->the_post();
                    global $product; // Ensure global $product is available
            ?>
		
			<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
            <div class="product">
                           
                    <?php if(has_post_thumbnail()): ?>
                        
                        <div class="product-image">
                        <!-- <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"> -->
                            <?php the_post_thumbnail('woocommerce_thumbnail'); ?> 
                            
                            
                        </div>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                    <div> <?php echo the_content(); ?> </div>
                    <!-- <a href="?add-to-cart=<?php echo esc_attr($product->get_id()); ?>" class="button add_to_cart_button">Add to Cart</a> -->
				 
            </div>
				</a>
				
            <?php
                }
            else:
                echo '<p>No products found.</p>';
            endif;
            wp_reset_postdata(); // Reset post data to avoid conflicts
            ?>
		</div>
	</section>
</section>

<?php get_footer(); ?>


<!-- TODO: add links when clicking on items -->