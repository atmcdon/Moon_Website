<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>
<div class="content">
	
	<h1 class="about-page-h1"><?php the_title(); ?></h1>
		<h3 class= "about-page-h3">
		<p>Mooncat and Magpie is Penny and Adina Whitcomb, a mother and daughter team who use our love of books and literature, Pop Culture, fantasy, and magic as inspiration for our unique, handcrafted products. </p>
		<p>Adina wanted to try making wands and flower fairies, so we did this for ourselves, and then made more to give to family and friends as gifts. Penny had the idea to make purses out of books, and wanted to find some ways to use the pages left over, so came up with some other book themed ideas. We decided to try selling our creations at a few local craft fairs and holiday bazaars. We have since spread our wings and found our place at community events and Arts markets.</p>
		<p>We have expanded our creative output into many types of products, journals, jewelry, embroidery, tea tins, wallets, home decor, all within our thematic range. We continue to try new ideas and add more unique products to our offerings. Everything we make is handcrafted, one of a kind, and a labor of love for us. We love the things we make and are very excited to meet the kindred spirits who enjoy our particular, whimsical vision.</p>
	</h3>
	
</div> <!-- This allows us to center content on page using CSS -->
<body>
	
	<div class="content">

		<h2 class="contact-form">Contact Form</h2>
		<div class="contact-page-form">
			<form id="customOrderForm" enctype="multipart/form-data">
				<?php wp_nonce_field('custom-order-form-nonce', 'custom_order_form_nonce'); ?>
				<div class="form-contact">
					<label for="name">Your name:</label>
					<input type="text" id="name" name="name" required>
				</div>
				<div class="form-contact">
					<label for="email">Your email:</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-contact">
					<label for="message">Your message:</label>
					<input type="message" id="message" name="message" required>
				</div>
				<button type="submit">Send</button>
			</form>
			
			<h2 class="contact-info">Our Contact Info</h2>
			<section class= contact-page-contactinfo>
				Email: mooncatandmagpie@gmail.com <br>
				Phone Number: (360) 509-4208 <br>
				Phone Number: (253) 677-4070 <br>
			</section>
			
		</div>
	</div>
			


<script type="text/javascript">
jQuery(document).ready(function($) {
    var customOrderForm = {
        ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
        security: '<?php echo wp_create_nonce('custom-order-form-nonce'); ?>'
    };

    $('#customOrderForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append('action', 'submit_custom_order_form');
        formData.append('security', customOrderForm.security);

        $.ajax({
            url: customOrderForm.ajax_url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.success) {
                    alert('Your custom order request has been sent successfully.');
                    $('#customOrderForm')[0].reset(); // Reset form fields
                } else {
                    alert('There was a problem with your submission. Please try again.');
                }
            }
        });
    });
});
</script>			

<?php get_footer(); ?>
	