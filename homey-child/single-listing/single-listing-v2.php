<?php
global $post, $layout_order, $hide_labels;
$booking_or_contact_theme_options = homey_option('what_to_show');
$booking_or_contact = homey_get_listing_data('booking_or_contact');
$nightsbridge_data = homey_get_listing_data('Nightsbridge (optional)');
$address = homey_get_listing_data('listing_address');

if(empty($booking_or_contact)) {
    $what_to_show = $booking_or_contact_theme_options;
} else {
    $what_to_show = $booking_or_contact;
}
$homey_booking_type = homey_booking_type();
?>
<section class="main-content-area detail-property-page detail-property-page-v2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="content-area">
                    <?php 
                        get_template_part('single-listing/title');
                        get_template_part('single-listing/top-gallery');
                        
                        
                        if ($layout_order) { 
                        foreach ($layout_order as $key=>$value) {

                            switch($key) { 
                                case 'about':
                                    get_template_part('single-listing/about');
                                break;

                                case 'host':
                                    get_template_part('single-listing/host');
                                break;

                                case 'about_commercial':
                                    get_template_part('single-listing/about', 'commercial');
                                break;

                                case 'services':
                                    get_template_part('single-listing/services');
                                break;
                                
                                case 'details':
                                    get_template_part('single-listing/details');
                                break;

                                case 'gallery':
                                    get_template_part('single-listing/gallery');
                                break;

                                case 'prices':
                                    if( $homey_booking_type == 'per_hour') {
                                        get_template_part('single-listing/prices-hourly');
                                    } else {
                                        get_template_part('single-listing/prices');
                                    }
                                break;

                                case 'accomodation':
                                    get_template_part('single-listing/accomodation');
                                break;

                                case 'map':
                                    get_template_part('single-listing/map');
                                break;


                                case 'features':
                                    get_template_part('single-listing/features');
                                break;

                                case 'video':
                                    get_template_part('single-listing/video');
                                break;

                                case 'rules':
                                    get_template_part('single-listing/rules');
                                break;

                                case 'custom-periods':
                                    get_template_part('single-listing/custom-periods');
                                break;

                                case 'availability':
                                    if( $homey_booking_type == 'per_hour') {
                                        get_template_part('single-listing/availability-hourly');
                                    } else {
                                        get_template_part('single-listing/availability');
                                    }
                                break;

                                case 'reviews':
                                    get_template_part('single-listing/reviews');
                                break;

                                case 'similar-listing':
                                    get_template_part('single-listing/similar-listing');
                                break;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 homey_sticky">
                <div class="sidebar right-sidebar">

                <div>
                        <!-- Here we added the Nightsbridge Button and link, AirBnb and WhatsApp -->
                <?php
                        //Custom Fields
                        if(class_exists('Homey_Fields_Builder')) {
                        $fields_array = Homey_Fields_Builder::get_form_fields(); 

                            if(!empty($fields_array)) {
                                foreach ( $fields_array as $value ) {
                                    $data_value = get_post_meta( get_the_ID(), 'homey_'.$value->field_id, true );
                                    $field_title = $value->label;
                                    $field_type = $value->type;
                                    
                                    $field_title = homey_wpml_translate_single_string($field_title);
                                    $data_value = homey_wpml_translate_single_string($data_value);

                                    if($field_title == 'Nightsbridge (optional)') {
                                        if(!empty($data_value)) {
                                            echo '<a href="#" title ="Book securely Online Now" class="QB wpcf7-form-control wpcf7-submit NBbutton">Check Availability - Book Online Now</a>';
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                </div>

                <?php 
                if($what_to_show == 'booking_form') {
                    if( $homey_booking_type == 'per_hour') {
                        get_template_part('single-listing/booking/sidebar-booking-hourly');
                    } else {
                        get_template_part('single-listing/booking/sidebar-booking-module');
                    }
                } elseif($what_to_show == 'contact_form') {
                    get_template_part('single-listing/contact-form');
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- main-content-area -->
              

<?php
        //Custom Fields
        if(class_exists('Homey_Fields_Builder')) {
        $fields_array = Homey_Fields_Builder::get_form_fields(); 

            if(!empty($fields_array)) {
                foreach ( $fields_array as $value ) {
                    $data_value = get_post_meta( get_the_ID(), 'homey_'.$value->field_id, true );
                    $field_title = $value->label;
                    $field_type = $value->type;
                    
                    $field_title = homey_wpml_translate_single_string($field_title);
                    $data_value = homey_wpml_translate_single_string($data_value);

                    if($field_title == 'Nightsbridge (optional)') {
                        if(!empty($data_value)) {
                            echo '
                            <div class="mask" role="dialog"></div>
                                            <div class="NBmodal" role="alert"><button class="NBclose" role="button">X</button>
                                            <div class="NBheader"><h3>BOOK ONLINE NOW!</h3>
                                            </div>
                                            <iframe src="https://book.nightsbridge.com/'.esc_attr( $data_value ).'?nbid=679"></iframe>
                                            </div>';
                        }
                    }
                }
            }
        }
?>

