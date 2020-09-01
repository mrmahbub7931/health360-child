<?php
/**
 * Child-Theme functions and definitions
 */


add_action('init','health360_contact_db');

	$loancard_includes = array(
		'/enqueue.php',                  	// enqueue all scripts
		'/apply-form.php',                  // Apply form shortcode
		'/apply-form-ajax.php',				// Apply form ajax request
	);

	foreach ( $loancard_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


function health360_contact_db() {

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'prescription_contact';

	$sql = "CREATE TABLE IF not exists $table_name (
		id mediumint(11) NOT NULL AUTO_INCREMENT,
		name varchar(255) NOT NULL,
		phone_number varchar(15) NOT NULL,
		email varchar(50) NOT NULL,
		address varchar(255) NULL,
		file varchar(255) NULL,
		time datetime DEFAULT CURRENT_TIMESTAMP NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}


// admin menu page
	if (!function_exists('health360_admin_menu')) {
		add_action('admin_menu','health360_admin_menu');

		function health360_admin_menu()
		{
			add_menu_page('Prescriptions','Prescriptions','manage_options','health360_prescription_dashboard','prescription_box_dahsboard','dashicons-email-alt',26);

			add_submenu_page('health360_prescription_dashboard','Form','Form','manage_options','health360_prescription','health360_prescription_callback_func');

		}

		function prescription_box_dahsboard(){
			include 'dashboard/application.php';
		}

		function health360_prescription_callback_func() {
			include 'dashboard/prescription_contact.php';
		}

		// function loan_callback_func() {
		// 	include 'templates/loan_application.php';
		// }


	}

?>
