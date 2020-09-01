<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if (!function_exists('health360_contact_form_shortcode')) {

	add_shortcode( 'custom_contact_form', 'health360_contact_form_shortcode' );
	function health360_contact_form_shortcode()
	{
		ob_start();
			?>
			<div class="health360_form">
				<form id="contact" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>" enctype="multipart/form-data">
	    			<div class="form-group">
	    				<label for="name">Full Name</label>
	    				<input type="text" name="name" id="name" class="form-control required" placeholder="Full Name">
	    			</div>
	    			<div class="form-group">
	    				<label for="number">Phone Number</label>
	    				<input type="text" name="number" id="number" class="form-control required" placeholder="Phone Number">
	    			</div>
	    			<div class="form-group">
	    				<label for="email">Email Address</label>
	    				<input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
	    			</div>
	    			<div class="form-group">
	    				<label for="address">Address</label>
	    				<textarea name="address" id="address" class="required form-control" placeholder="Address"></textarea>
	    			</div>
	    			<div class="form-group">
	    				<label for="file">Upload Prescription</label>
	    				<input type="file" id="file" class="form-control-file required" accept="image/*" multiple>
	    			</div>
	    			<div class="btn-group">
	    				<button class="is_large button primary" name="presc_submit" id="presc_submit">Submit</button>
	    			</div>
	    			<p class="success_message"></p>
				</form>
			</div>
			<?php
			
			return ob_get_clean();

	}

} 