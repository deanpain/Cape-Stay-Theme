<?php
  function printDates() {
   get_template_part('/single-listing/printDates.php');
}
add_action('printtheDates', 'printDates');




//Custom Modal Code
function my_scripts_method() {
// register your script location, dependencies and version
   wp_register_script('custom_script',
   get_stylesheet_directory_uri() . '/custom_js/custom.js',
   array('jquery'),
   '1.0' );
 // enqueue the script
  wp_enqueue_script('custom_script');
  }
add_action('wp_enqueue_scripts', 'my_scripts_method');



function vc_remove_wp_admin_bar_button() {
  remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
}
add_action( 'vc_after_init', 'vc_remove_wp_admin_bar_button' );


function reg_cat() {
		 register_taxonomy_for_object_type('category','listing');
}
add_action('init', 'reg_cat');

// Shortcode to output custom PHP in Elementor
function wpc_elementor_shortcode( $atts ) {
  echo '<div class="banner-caption-side-search">
  <div>';
   get_template_part('template-parts/search/banner-vertical-daily', 'daily');
   echo '</div></div>';
}
add_shortcode( 'my_elementor_php_output', 'wpc_elementor_shortcode');





?>
