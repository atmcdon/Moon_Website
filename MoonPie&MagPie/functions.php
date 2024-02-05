<?php
    

    //adds syles
    //https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    function MoonCat_styles ()
    {
        wp_enqueue_style(
             'MoonPie&MagPie-main-styles',
             get_template_directory_uri() . '/assets/css/main.css'
        );

    }
    add_action('wp_enqueue_scripts', 'MoonCat_styles');


    //add menus functions
    add_theme_support('menus');

    // Register menus
    register_nav_menus(
        array (
            'menu' => __('main_menu', 'theme')
        )
    );
    // https://developer.woo.com/docs/classic-theme-development-handbook/
    function mytheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
    
        
    
   


    
    
    

    
?>