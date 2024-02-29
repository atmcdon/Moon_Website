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

    // function load_javascript()
    // {
    //     wp_register_script('custom', get_template_directory_uri() . '/app.js', 'jquery', 1, true);
    //     wp_enqueue_scripts('custom');
    // }
    // add_action('wp_enqueue_scripts', 'load_javascript');


    //add menus functions
    add_theme_support('menus');

    // Register menus
    function my_custom_theme_setup() {
        register_nav_menus(
            array(
                'main_menu' => __('Main Menu', 'theme'),
            )
        );
    }
    add_action('after_setup_theme', 'my_custom_theme_setup');
    
    

    // https://developer.woo.com/docs/classic-theme-development-handbook/
    function mytheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
    
        
    add_action('woocommerce_single_product_summary', 'custom_contact_form_button', 30);
    function custom_contact_form_button() {
        echo '<button id="customContactFormButton">Contact to Buy</button>';
    }



    
    // function custom_enqueue_scripts() {
    //     wp_enqueue_script('product-overlay', get_template_directory_uri() . '/js/product-overlay.js', array(), false, true);
    // }
    // add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');
    

	function enqueue_custom_order_form_script() {
		wp_enqueue_script('custom-order-form-ajax', get_template_directory_uri() . '/js/custom-order-form.js', 							array('jquery'), null, true);
		wp_localize_script('custom-order-form-ajax', 'customOrderForm', array(
			'ajax_url' => admin_url('admin-ajax.php')
		));
	}
	add_action('wp_enqueue_scripts', 'enqueue_custom_order_form_script');

	function handle_custom_order_form_submission() {
    check_ajax_referer('custom-order-form-nonce', 'security');

    // Process text fields as before
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $description = sanitize_textarea_field($_POST['description']);

    $to = 'atmcdon1@gmail.com';
    $subject = 'New Custom Order Request';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nDescription: $description";
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    $attachments = array();
    if ( isset($_FILES['imageAttachment']) ) {
        // Ensure the file is uploaded with no errors
        if($_FILES['imageAttachment']['error'] === UPLOAD_ERR_OK) {
            $attachments[] = $_FILES['imageAttachment']['tmp_name'];
        } else {
            wp_send_json_error('Error uploading file.');
            wp_die();
        }
    }

    if ( wp_mail($to, $subject, $body, $headers, $attachments) ) {
        wp_send_json_success('Email sent successfully.');
    } else {
        wp_send_json_error('Failed to send email.');
    }

    wp_die(); 
}

	add_action('wp_ajax_nopriv_submit_custom_order_form', 'handle_custom_order_form_submission');
	add_action('wp_ajax_submit_custom_order_form', 'handle_custom_order_form_submission');


    
    
    

    
?>