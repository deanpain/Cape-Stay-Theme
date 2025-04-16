<?php
global $post, $layout_order, $hide_labels;
$booking_or_contact_theme_options = homey_option('what_to_show');
$booking_or_contact               = homey_get_listing_data('booking_or_contact');
$address                          = homey_get_listing_data('listing_address');
$nightsbridgeBBID                 = get_post_meta($post->ID, 'homey_nightsbridgef5ea9b633deaae', true);
$nightsbridgeRoom                 = get_post_meta($post->ID, 'homey_nightsbridge-roomf6203f097cb2df', true);


if( has_post_thumbnail( $post->ID ) ) {
    $featured_img = wp_get_attachment_image_url( get_post_thumbnail_id(),'full' );
} else {
    $featured_img = homey_get_image_placeholder_url( 'homey-gallery' );
}

if (empty($booking_or_contact)) {
$what_to_show = $booking_or_contact_theme_options;
} else {
$what_to_show = $booking_or_contact;
}
$homey_booking_type = homey_booking_type();
?>
<section class="detail-property-page-header-area detail-property-page-header-area-v1">
    <div class="property-header-image" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.7)), url(<?php echo esc_url($featured_img); ?>); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a data-fancy-image-index="-1" href="<?php echo esc_url($featured_img); ?>" class="fanboxTopGallery-item swipebox">
                    <img src="<?php echo esc_url($featured_img); ?>" />
                    </a>
                    <a data-fancy-image-index="-1" href="<?php echo esc_url($featured_img); ?>" class="fanboxTopGallery-item swipebox property-header-gallery-btn">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </a>
                    <?php
                    $size = 'homey-gallery';
                    $thumb_size = 'homey-gallery-thumb2';
                    $listing_images = rwmb_meta( 'homey_listing_images', 'type=plupload_image&size='.$size, $post->ID );
                    fancybox_gallery_html($listing_images, 'fanboxTopGallery');//hidden images for gallery fancybox 3
                    ?>
                </div>
            </div>
            <?php
            get_template_part('single-listing/newHeader');
            ?>
        </div>
    </div>
</section><!-- header-area -->

    <section class="main-content-area detail-property-page detail-property-page-v1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="content-area">


                        <?php


                    if ($layout_order) {
                    foreach ($layout_order as $key => $value) {
                    switch ($key) {
                    case 'about':
                    get_template_part('single-listing/about');
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
                    if ($homey_booking_type == 'per_hour') {
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
                    case 'nearby':
                    get_template_part('single-listing/what-nearby');
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
                    if ($homey_booking_type == 'per_hour') {
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
                    <div class="views"><?php if(function_exists('the_views')) { the_views(); } ?></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 homey_sticky">
                    <div class="sidebar right-sidebar">

                        <!-- Here we added the Nightsbridge Button -->
                        <?php
                    if (!empty($nightsbridgeBBID)) {
                    echo '
                    <button type="button" data-toggle="modal" data-target="#nightsbridge_modal" class="trigger-overlay btn btn-primary hidden-xs NBbutton_sidebar"><i class="fas fa-hand-pointer-o"></i> Live Pricing & Availability</button>';
                    }
                    ?>


                        <?php
                    if ($what_to_show == 'booking_form') {
                    if ($homey_booking_type == 'per_hour') {
                    get_template_part('single-listing/booking/sidebar-booking-hourly');
                    } else {
                    get_template_part('single-listing/booking/sidebar-booking-module');
                    }
                    } elseif ($what_to_show == 'contact_form') {
                    get_template_part('single-listing/contact-form');
                    } elseif ($what_to_show == 'contact_form_to_guest') {
                    if (is_user_logged_in()) {
                    if ($homey_booking_type == 'per_hour') {
                    get_template_part('single-listing/booking/sidebar-booking-hourly');
                    } else {
                    get_template_part('single-listing/booking/sidebar-booking-module');
                    }
                    } else {
                    get_template_part('single-listing/contact-form');
                    }
                    }
                    ?>

                        <?php get_sidebar('listing');?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- main-content-area -->
    <?php
    // Nightsbridge Modal
    if (!empty($nightsbridgeBBID)) {
    echo '
    <div class="modal fade custom-modal-contact-host" id="nightsbridge_modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="NBmodal" role="alert">
            <div class="NBheader modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h3 class="modal-title">Secure Bookings Via Nightsbridge</h3>
            </div>
        <iframe class="' . $nightsbridgeBBID . '" src="https://book.nightsbridge.com/' . $nightsbridgeBBID . '?&nbid=679&bbrtid='.$nightsbridgeRoom.'" ></iframe>
        </div>
        </div>
        ';
        }
    //End NB Modal
    ?>