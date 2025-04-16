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
<section class="detail-property-page-header-area detail-property-page-header-area-v4">
	<?php
	get_template_part('single-listing/title3');
	get_template_part('single-listing/top-gallery-new');
	get_template_part('single-listing/ownerHeader2');

	?>
</section><!-- header-area -->





	<section class="main-content-area detail-property-page detail-property-page-v1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<div class="content-area">


						<?php
					get_template_part('single-listing/prices');	
						
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
					echo '';
					} else {

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
				}
					?>

					<div class="sidebar-booking-module-footer">
						 <div class="banner-caption-side-search">
							<h3 class="title"><i class="fas fa-search"></i> Search All Listings</h3>
							  <div>
								<?php
								get_template_part('template-parts/search/banner-vertical-daily', 'daily');
								?>
							   </div>
						</div>
						<div class="block-body-sidebar">



							<?php if(homey_option('print_button') != 0) { ?>
							<button type="button" id="homey-print" class="btn btn-full-width btn-blank">
								<i class="fa fa-print" aria-hidden="true"></i> <?php echo esc_attr($homey_local['print_label']); ?>
							</button>
							<?php } ?>


						</div><!-- block-body-sidebar -->

						<div class="block-body-sidebar nightsbridgeCTA">

							<img width="344" height="97" src="https://mlbyiwdkornc.i.optimole.com/bXkSfNU-RoOreQnL/w:344/h:97/q:mauto/f:avif/https://www.capestay.co.za/wp-content/uploads/main-site-assets/random/cape-town-garden-route-and-eastern-cape-accommodation-south-africa.png" class="attachment-full size-full perfmatters-lazy loaded" alt="Cape Town, Garden Route and Eastern Cape Accommodation South Africa" title="Cape Town, Garden Route and Eastern Cape Accommodation South Africa 1" data-src="https://mlbyiwdkornc.i.optimole.com/bXkSfNU-RoOreQnL/w:344/h:97/q:mauto/f:avif/https://www.capestay.co.za/wp-content/uploads/main-site-assets/random/cape-town-garden-route-and-eastern-cape-accommodation-south-africa.png">
							<p>Online bookings powered by <a class="nightsbridge-link" href="https://site.nightsbridge.com" target="_blank">NightsBridge</a></p>


						</div>

					</div><!-- sidebar-booking-module-footer -->

						<?php get_sidebar('listing');?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- main-content-area -->

		<script type="text/javascript">
		function newSrc() {
		  var a = document.querySelector('input[name=arrive]').value
		  var b = document.querySelector('input[name=depart]').value

		  //var c = $("#" + attName + " input:first").text();
		  
		  
		  var nightsbridgeBBID = <?php echo json_encode($nightsbridgeBBID); ?>;

		  //var attData = document.querySelector('input[name=arrive]').value
			//alert(attData);



		  var newSrc =
			"https://book.nightsbridge.com/" + nightsbridgeBBID + "?startdate=" +
			a +
			"&enddate=" +
			b +
			"&nbid=679&bbrtid=85";

			//alert(newSrc);
		  document.getElementById("NBframe").src = newSrc;
		}
		</script>

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
		<iframe id="NBframe"
		src="https://book.nightsbridge.com/' . $nightsbridgeBBID . '
		?startdate=' . $_GET['arrive'] .'&enddate=' . $_GET['depart'] .'
		&nbid=679&bbrtid=' . $nightsbridgeRoom . '
		"
		>
		</iframe>
		</div>
		</div>
		';
		}
	//End NB Modal	
	?>