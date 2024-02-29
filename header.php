<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mooncat & Magpie</title>
  <meta charset= "UTF-8">
  
  <meta name="viewport" content= "width=device-width, inital-scale=2">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MedievalSharp">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  

  <!-- Style sheet \/ -->
  <?php wp_head(); ?>
  <!-- <link rel="stylesheet" type="text/css" href="/wp-content/themes/MoonPie&MapPie/assets/main.css"> -->
</head>
<body>
<!-- <body <?php body_class();?>> -->
  <div class="background">
	

  <div class="header">
  <section class=header-cart>
<!--     <?php
      if (class_exists('WooCommerce')) {
          $cart_count = WC()->cart->get_cart_contents_count();
          $cart_url = wc_get_cart_url();

          echo '<a href="' . esc_url($cart_url) . '" title="View your shopping cart" class="cart-icon-link">';
          echo '<i class="fa fa-shopping-cart"></i>';
          if ($cart_count > 0) {
              echo '<span class="cart-count">' . esc_html($cart_count) . '</span>';
          }
          echo '</a>';
      }
    ?> -->

    </section>
    <section class="header-name-logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="logo" class="logo">
      <div class= "header-name">
          <h1>Mooncat & Magpie</h1>
    </div>
      <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="logo" class="logo"> -->
    </section>
    
    

  </div> 
</div>
</body>
<div class = mobile-nav-view>
  <button class="hamburger-menu" >
      <section class = bar ></section> <!-- Hamburger Icon -->
      <section class = bar ></section>
      <section class = bar ></section>
  </button>
    <div class="mobile-menu">
      <nav class="side-menu">
          <?php
          wp_nav_menu( array(
              'theme_location' => 'primary_menu', // Use the registered menu location
              'container' => false, // No container wrapping the ul
          ) );
          ?>
      </nav>
    </div>
</div>
	
	


<nav class="top-menu">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary_menu', // Use the registered menu location
        'container' => false, // No container wrapping the ul
    ) );
    ?>
</nav>
<script>
  document.querySelector('.hamburger-menu').addEventListener('click', function() {
      document.querySelector('.mobile-menu').classList.toggle('active');
  });


  </script>
	
	
	
</div>