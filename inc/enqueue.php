<?php
/**
 * loancard custom post type
 *
 * @package loancard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function creditcard_child_scripts() {
    wp_enqueue_style( 'health360-parent-style', get_template_directory_uri(). '/style.css' );

    wp_enqueue_style( 'health360-dataTable-css', get_stylesheet_directory_uri() . '/assets/css/jquery.dataTables.min.css' );
    wp_enqueue_style( 'health360-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );


    wp_enqueue_script('health360-dropzone', get_stylesheet_directory_uri() . '/assets/js/dropzone.js', array('jquery'), uniqid(), false);

    wp_enqueue_script('health360-bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), uniqid(), false);

    wp_enqueue_script('dataTables-jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.dataTables.min.js', array('jquery'), uniqid(), false);

    wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri() . '/assets/js/jquery.validate.js', array('jquery'), uniqid(), false);


    wp_enqueue_script('jquery-custom-contact', get_stylesheet_directory_uri() . '/assets/js/custom_contact_form.js', array('jquery'), uniqid(), true);

}
add_action( 'wp_enqueue_scripts', 'creditcard_child_scripts' );
add_action( 'admin_enqueue_scripts', 'loancard_admin_enqueue' );
function loancard_admin_enqueue()
{
	wp_enqueue_style( 'admin-css', get_stylesheet_directory_uri() . '/assets/css/admin.css' );
    wp_enqueue_style( 'health360-dataTable-css', get_stylesheet_directory_uri() . '/assets/css/jquery.dataTables.min.css' );


    wp_enqueue_script('jquery-ext',get_stylesheet_directory_uri() . '/assets/js/jquery-1.12.4.js',array(),uniqid(),false);
    
    wp_enqueue_script('health360-bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery-ext'), uniqid(), false);

    wp_enqueue_script('dataTables-jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.dataTables.min.js', array('jquery-ext'), uniqid(), false);

	wp_enqueue_script('admin-js', get_stylesheet_directory_uri() . '/assets/js/admin.js', array('jquery'), uniqid(), true);
}
