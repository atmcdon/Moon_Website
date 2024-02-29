<?php
/* Template Name: Custom Order Page */
get_header();
?>

<!-- Custom Order Form Page Content -->
<div class="content">
    <div class="custom-order-form">
        <h2>Custom Order Request</h2>
        <p>
            If one of our one-of-a-kind items inspired a flight of fancy, contact us here! A book purse created with your favorite novel? A special craft made with that childhood toy you rediscovered? We may just be able to fulfill your wishes.<br>
        </p>
        <form id="customOrderForm" enctype="multipart/form-data">
			<?php wp_nonce_field('custom-order-form-nonce', 'custom_order_form_nonce'); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="description">Custom Order Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="imageAttachment">Attach image:</label>
                <input type="file" id="imageAttachment" name="imageAttachment" accept="image/*">
            </div>
            <br>
            <button type="submit">Submit Request</button>
        </form>
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
