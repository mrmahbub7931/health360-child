<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action('wp_ajax_custom_contact_form', 'health360_custom_contact_form_callback');
add_action('wp_ajax_nopriv_custom_contact_form', 'health360_custom_contact_form_callback');


function health360_custom_contact_form_callback()
{
	global $wpdb;
	$table = $wpdb->prefix.'prescription_contact';

	$arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
	$uploads = [];
	for ($i=0; $i < count($_FILES['files']['name']) ; $i++) { 
		if (in_array($_FILES['files']['type'][$i], $arr_img_ext)) {
 
            $upload = wp_upload_bits($_FILES['files']['name'][$i], null, file_get_contents($_FILES['files']['tmp_name'][$i]));
            $uploads[] .= $upload['url'];
        }
	}

		$images = implode(",", $uploads);

		$data = [
			'name' => $_POST['name'],
			'phone_number' => $_POST['phone_number'],
			'email' => $_POST['email'],
			'address'	=>	$_POST['address'],
			'file'	=>	$images,
		];

	$formdata = $wpdb->insert($table,$data);
	wp_die();
}


// function health360_custom_contact_form_callback()
// {
// 	global $wpdb;
// 	$table = $wpdb->prefix.'prescription_contact';

// 	$arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');

// 	if ('POST' === $_SERVER['REQUEST_METHOD']) {
// 		$fields = array('name','phone_number','email','address');
// 		foreach ($fields as $field) {
// 			if (isset($_POST[$field])) {
// 				$posted[$field] = stripcslashes(trim($_POST[$field]));
// 			}else {
// 				$posted[$field] = '';
// 			}
// 		}

// 		if (!function_exists('wp_handle_upload')) {
// 			require_once( ABSPATH . 'wp-admin/includes/file.php' );
// 		}

// 		if (isset($_FILES['files'])) {
// 			$uploadedFile = $_FILES['files'];

// 			$upload_overrides = array(
// 			    'test_form' => false
// 			);
 
// 			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

// 			$attachments = $movefile['file'];
// 			$to = get_bloginfo('admin_email');
// 			$to = 'redhatmahbub@gmail.com';
// 			$subject = 'New Prescription From '.$name;
			
// 			$message  = "Name: ".$posted['name']."\n";
// 			$message .= "Phone number: ".$posted['phone_number']."\n";
// 			$message .= "Email: ".$posted['email']."\n";
// 			$message .= "Address: ".$posted['address']."\n";
// 			wp_mail($to,$subject,$message,$attachments);
// 			unlink($movefile['file']);
// 			var_dump($movefile);
// 		}
// 	}

// 	$name = wp_strip_all_tags($_POST['name']);
// 	$phone = wp_strip_all_tags($_POST['phone']);
// 	$email = wp_strip_all_tags($_POST['email']);
// 	$address = wp_strip_all_tags($_POST['address']);
// 	$file = $_POST['file'];
	
// 	$data = [
// 		'name' => $name,
// 		'phone_number' => $phone,
// 		'email' => $email,
// 		'address'	=>	$address,
// 		'file'	=>	$file
// 	];

// 	$formdata = $wpdb->insert($table,$data);




// 	$to = get_bloginfo('admin_email');
// 	$to = 'redhatmahbub@gmail.com';
// 	$subject = 'New Prescription From '.$name;
	
// 	$message  = "Name: ".$name."\n";
// 	$message .= "Phone number: ".$phone."\n";
// 	$message .= "Email: ".$email."\n";
// 	$message .= "Address: ".$address."\n";
// 	// $headers = array('Content-Type: text/html; charset=UTF-8');
// 	// $attachments = array( WP_CONTENT_DIR . '/uploads/file_to_attach.zip' );
// 	$attachments = array( $file );
// 	wp_mail($to,$subject,$message,$attachments);
// 	echo $name;
// 	var_dump($wpdb);
// 	die();
// }