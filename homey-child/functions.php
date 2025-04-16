<?php
function homey_enqueue_styles() {
    // enqueue parent styles
   // wp_enqueue_style('homey-parent-theme', get_template_directory_uri() .'/style.css');
    // enqueue child styles
   // wp_enqueue_style('homey-child-theme', get_stylesheet_directory_uri() .'/style.css', array('homey-parent-theme'));
}
add_action('wp_enqueue_scripts', 'homey_enqueue_styles');

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

//include('custom-shortcodes.php');

add_filter( 'wpcf7_form_elements', 'do_shortcode' );



function calendar_shortcode() {
  return '
  <div class="search-date-range main-search-date-range-js">
    <div class="search-date-range-arrive">
      <label class="animated-label">Arrive</label>
      <input name="arrive" autocomplete="off" value="Arrive" type="text" class="form-control" placeholder="Arrive">
    </div>
    <div class="search-date-range-depart">
      <label class="animated-label">Arrive</label>
      <input name="depart" autocomplete="off" value="Depart" type="text" class="form-control" placeholder="Depart">
    </div>
  </div>
  ';
  get_template_part ("template-parts/search/search-calendar");
  
  $homeySearchCalendar = homeySearchCalendar();
  return $homeySearchCalendar;
}
add_shortcode( 'calendar_shortcode', 'calendar_shortcode');


/**
 * Enable shortcodes for menu navigation.
 */
if ( ! has_filter( 'wp_nav_menu', 'do_shortcode' ) ) {
    add_filter( 'wp_nav_menu', 'shortcode_unautop' );
    add_filter( 'wp_nav_menu', 'do_shortcode', 11 );
}



?>
