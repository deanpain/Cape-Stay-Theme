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
$booking_or_contact_theme_options = homey_option('what_to_show');
$booking_or_contact = homey_get_listing_data('booking_or_contact');
if(empty($booking_or_contact)) {
	$what_to_show = $booking_or_contact_theme_options;
} else {
	$what_to_show = $booking_or_contact;
}
$homey_booking_type = homey_booking_type();
?>
<section class="detail-property-page-header-area detail-property-page-header-area-v6 bla">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php get_template_part('single-listing/title'); ?>
				<?php
					$size = 'homey-gallery';
					$thumb_size = 'homey-gallery-thumb2';
					$listing_images = rwmb_meta( 'homey_listing_images', 'type=plupload_image&size='.$size, $post->ID );
					get_template_part('single-listing/top-gallery-grid-section');
				?>
			</div>
		</div>
	</div>
</section><!-- header-area -->

<section class="main-content-area detail-property-page detail-property-page-v6 block-section-no-bg">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="content-area">
					<?php
					if ($layout_order) {
						foreach ($layout_order as $key=>$value) {

							switch($key) {
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

								case 'host':
									get_template_part('single-listing/host');
									break;


								case 'similar-listing':
									if( $homey_booking_type == 'per_hour') {
										get_template_part('single-listing/similar-listing-hourly');
									} else {
										get_template_part('single-listing/similar-listing');
									}
									break;

							}
						}
					}

					?>


				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 homey_sticky">
				<div class="sidebar right-sidebar">
						<?php
							get_template_part('single-listing/contact-form');
					?>

					<?php get_sidebar('listing'); ?>

				</div>
			</div>
		</div>
	</div>
</section><!-- main-content-area -->
	<?php
// Nightsbridge Modal
if (!empty($nightsbridgeBBID)) {
	get_template_part('single-listing/nightsbridge');
	}
//End NB Modal	
?>