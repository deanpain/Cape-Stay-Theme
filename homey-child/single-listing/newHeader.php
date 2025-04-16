<?php
global $post, $homey_prefix, $listing_author;
$address = homey_get_listing_data("listing_address");
$is_superhost = $listing_author["is_superhost"];
$rating = homey_option("rating");
$total_rating = get_post_meta($post->ID, "listing_total_rating", true);
$listing_id = $post->ID;
$price_per_night = get_post_meta($listing_id, $homey_prefix.'night_price', true);
?>



<div class="container">
    <div class="col-md-12">
        <div class="title-section">
        <h1 class="listing-title">
        <?php
        the_title();
        homey_listing_featured(get_the_ID());
        ?>
        </h1>
    </div>
        <div class="col-md-8">
            <div class="title-section">
                <div class="block block-top-title">
                    <?php if (!empty($address)) { ?>
                    <address><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_attr(
                        $address
                    ); ?></address>
                    <?php } ?>
                    </div><!-- block -->
                    </div><!-- title-section -->
                    <?php get_template_part("single-listing/title_about"); ?>
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
      </div>
            <div class="col-md-12 separator"></div>
            <div class="col-md-12">
                <div class="col-md-8">
                    <?php
                    get_template_part("template-parts/breadcrumb");
                    if (homey_option("detail_share") != 0) {
                    get_template_part("single-listing/share");
                    }
                    ?>


                </div>
                <div class="col-md-4">
                    <?php
                    if(!empty($price_per_night)) { ?>
                    <span class="item-price"><sub>From</sub>
                        <?php
                        echo homey_formatted_price($price_per_night, true, true); ?><sub><?php echo esc_attr($price_separator); ?><?php echo homey_get_price_label();?></sub>
                    </span>
                    <?php } else {
                    echo '<span class="item-price free">'.esc_html__('Rate on Application', 'homey').'</span>';
                    }?>
                </div>
            </div>
            </div><!-- end container -->