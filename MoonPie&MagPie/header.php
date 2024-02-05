<!DOCTYPE html>
<html lang="en">
<head>
  <title>MoonCat</title>
  <meta charset= "UTF-8">
  
  <meta name="viewport" content= "width=device-width, inital-scale=2">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <!-- Style sheet \/ -->
  <?php wp_head(); ?>
  <!-- <link rel="stylesheet" type="text/css" href="/wp-content/themes/MoonPie&MapPie/assets/main.css"> -->
</head>
<body>
  <div class="header">
    <h1>MoonCat</h1>
    <p>Logo.</p>
  </div>
    <!-- <ul>
        <li><a href="home">Home</a></li>
        <li><a href="shop">Shop</a></li>
        <li><a href="catagory/blog/">Events</a></li>
        <li><a href="https://atmcdon.github.io/Website/custom.html">Custom Orders</a></li>
        <li><a href="https://atmcdon.github.io/Website/contact.html">Contact</a></li>
        <li><a href="https://atmcdon.github.io/Website/about.html">About</a></li>
    </ul> -->
</body>
<?php 
//add menu
    wp_nav_menu( 
        array( 
            'theme_location' => 'menu'
        ) 
    ); 
?>