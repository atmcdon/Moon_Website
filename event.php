<?php
/*
Template Name: Event Page
*/
?>

<?php get_header(); ?>

<div class="content">
    <section class="event-header">
    
    <!-- Combined Section for Blurb and Social Media Links -->
    <div class="events-info-social-wrapper">
        <!-- Upcoming Events Blurb -->
        <section class="events-blurb">
            <h2>About Our Upcoming Events</h2>
            <p>Join us for a series of exciting events that bring together enthusiasts and professionals. Stay tuned for more updates and don't miss the chance to be part of our vibrant community.</p>
            <section class="social-media">
            <h2>Follow Us</h2>
            <p>Stay connected with us for the latest updates:</p>
            <a href="https://www.facebook.com/mooncatandmagpie" class="facebook-link" target="_blank">Our Facebook Page</a>
            
        </section>
        </section>

        
        
    </div>

  
    
        <!-- <h1 class="page-title"><?php the_title(); ?></h1> -->
<!--         <div class="subscribe-box">
            <h3>Subscribe to Events</h3>
            <form class="subscribe-form">
                <input type="email" name="email" placeholder="Enter your email" class="email-input">
                <button type="submit" class="btn-subscribe">Subscribe</button>
            </form>
        </div> -->
    </section>
    
    <section class="upcoming-events">
        <h2>Upcoming Events</h2>
        <div class="events-grid">
            <?php
            $events_query = new WP_Query(array(
                'category_name' => 'events',
                'posts_per_page' => 5,
            ));
            if($events_query->have_posts()) : while($events_query->have_posts()) : $events_query->the_post();
            ?>
            <div class="event-card">
                <h3><?php the_title(); ?></h3>
                <?php if(has_post_thumbnail()): ?>
                    <div class="event-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="event-description">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php endwhile; else: ?>
            <p>No upcoming events found.</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
