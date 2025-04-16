<?php
global $post, $homey_prefix, $listing_author;
$address = homey_get_listing_data('listing_address');

$is_superhost = $listing_author['is_superhost'];

$rating = homey_option('rating');
$total_rating = get_post_meta( $post->ID, 'listing_total_rating', true );
?>
<div class="title-section container">
    <div class="block block-top-title">

        <div class="block-body">
            <div class="col-md-8">
                <h1 class="listing-title">
                    <?php the_title(); ?> <?php homey_listing_featured(get_the_ID()); ?>
                </h1>

                <?php if(!empty($address)) { ?>
                <address><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_attr($address); ?></address>
                <?php } ?>

                <?php if($rating && ($total_rating != '' && $total_rating != 0 ) ) { ?>
                <div class="list-inline rating hidden-xs">
                    <?php echo homey_get_review_stars($total_rating, true, true); ?>
                </div>
                <?php } ?>
                <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>

            <?php if ($listing_author["name"] == "Cape Stay Reservations") {
            echo '<div class="col-md-4">
                <div id="host-section" class="host-section">
                    <p class="host_span">' .
                        esc_attr(homey_option("sn_hosted_by")) .
                        ' <span>Cape Stay Rentals</span></p>
                        <p>Email us at <a href="mailto: res@capestay.co.za?subject=';
                            the_title();
                        echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">res@capestay.co.za</p></a>
                        <p>Call us on <a href="tel:+27-021-3000-777">+27-021-3000-777</a></br>
                    </p>
                </div>
            </div>
            <!-- end host section -->';
            } else {
            get_template_part("single-listing/ownerHeader");
            } ?>

        </div>    <!-- block-body -->
    </div><!-- block -->
</div><!-- title-section -->