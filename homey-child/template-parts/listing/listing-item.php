<?php
global $post, $homey_prefix, $homey_local;
$listing_images = get_post_meta( get_the_ID(), $homey_prefix.'listing_images', false );
$address        = get_post_meta( get_the_ID(), $homey_prefix.'listing_address', true );
//$cities         = get_post_meta( get_the_ID(), $homey_prefix.'cities', false );

$bedrooms       = get_post_meta( get_the_ID(), $homey_prefix.'listing_bedrooms', true );
$guests         = get_post_meta( get_the_ID(), $homey_prefix.'guests', true );
$beds           = get_post_meta( get_the_ID(), $homey_prefix.'beds', true );
$baths          = get_post_meta( get_the_ID(), $homey_prefix.'baths', true );
$night_price    = get_post_meta( get_the_ID(), $homey_prefix.'night_price', true );
$listing_author = homey_get_author();
$enable_host = homey_option('enable_host');
$compare_favorite = homey_option('compare_favorite');

$listing_price = homey_get_price();

$cgl_meta = homey_option('cgl_meta');
$cgl_beds = homey_option('cgl_beds');
$cgl_baths = homey_option('cgl_baths');
$cgl_guests = homey_option('cgl_guests');
$cgl_types = homey_option('cgl_types');
$rating = homey_option('rating');
$total_rating = get_post_meta( get_the_ID(), 'listing_total_rating', true );

$bedrooms_icon = homey_option('lgc_bedroom_icon');
$bathroom_icon = homey_option('lgc_bathroom_icon');
$guests_icon = homey_option('lgc_guests_icon');
$price_separator = homey_option('currency_separator');

$nightsbridgeBBID = get_post_meta( $post->ID, 'homey_nightsbridgef5ea9b633deaae', true );
$mycity = homey_taxonomy_simple('listing_city');
$lowercaseVariable = strtolower($mycity);






if(!empty($bedrooms_icon)) {
    $bedrooms_icon = '<i class="'.esc_attr($bedrooms_icon).'"></i>';
}
if(!empty($bathroom_icon)) {
    $bathroom_icon = '<i class="'.esc_attr($bathroom_icon).'"></i>';
}
if(!empty($guests_icon)) {
    $guests_icon = '<i class="'.esc_attr($guests_icon).'"></i>';
}
$homey_permalink = homey_listing_permalink();
?>
<div class="item-wrap infobox_trigger homey-matchHeight">
    <div class="media property-item">
        <div class="media-left">
            <div class="item-media item-media-thumb">

                <?php homey_listing_featured(get_the_ID()); ?>

                    <!-- Here we added the Nightsbridge overlay and link -->

                        <?php if (!empty($nightsbridgeBBID)) {
                        echo '
                        <div class="NightsBridge"><span title="Check Availability - Book Online with Nightsbridge Secure Booking Engine">BOOK ONLINE</span></div>
                        ';
                        }
                        ?>
                    <!-- end NB overlay -->



                <a class="hover-effect" href="<?php echo esc_url($homey_permalink); ?>" rel=”noopener” target=_blank>
                <?php
                if( has_post_thumbnail( $post->ID ) ) {
                    the_post_thumbnail( 'homey-listing-thumb',  array('class' => 'img-responsive' ) );
                }else{
                    homey_image_placeholder( 'homey-listing-thumb' );
                }
                ?>
                </a>


                <?php if (!empty($night_price)) {
                        ?>
                        <div class="item-media-price">
                    <span class="item-price list">
                        <?php echo homey_formatted_price($listing_price, true, true); ?><sub><?php echo esc_attr($price_separator); ?><?php echo homey_get_price_label();?></sub>
                    </span>
                </div>
                    <?php

                    } else if($$night_price == '0') {
                    echo '<div class="item-media-price"><span class="item-price list"><sub>REQUEST FOR PRICE</sub></span></div>';

                    } else { echo '<div class="item-media-price"><span class="item-price list"><sub>REQUEST FOR PRICE</sub></span></div>';}



                ?>

            </div>
        </div>
        <div class="media-body item-body clearfix">
            <div class="item-title-head table-block">
                <div class="title-head-left">
                    <h2 class="title"><a href="<?php echo esc_url($homey_permalink); ?>" rel=”noopener” target=_blank>
                    <?php the_title(); ?></a></h2>
                    <p class="address">
                    <a href="/<?php echo $lowercaseVariable; ?>" target="_blank" title="Show all listings in this Suburb"><?php echo $mycity; ?></a>
                    </p>
                </div>
            </div>

            <?php if($cgl_meta != 0) { ?>
            <ul class="item-amenities">

                <?php if($cgl_beds != 0 && $bedrooms != '') { ?>
                <li>
                    <?php echo $bedrooms_icon; ?>
                    <span class="total-beds"><?php echo esc_attr($bedrooms); ?></span> <span class="item-label"><?php echo esc_attr(homey_option('glc_bedrooms_label'));?></span>
                </li>
                <?php } ?>

                <?php if($cgl_baths != 0 && $baths != '') { ?>
                <li>
                    <?php echo $bathroom_icon; ?>
                    <span class="total-baths"><?php echo esc_attr($baths); ?></span> <span class="item-label"><?php echo esc_attr(homey_option('glc_baths_label'));?></span>
                </li>
                <?php } ?>

                <?php if($cgl_guests!= 0 && $guests != '') { ?>
                <li>
                    <?php echo $guests_icon; ?>
                    <span class="total-guests"><?php echo esc_attr($guests); ?></span> <span class="item-label"><?php echo esc_attr(homey_option('glc_guests_label'));?></span>
                </li>
                <?php } ?>

                <?php if($cgl_types != 0) { ?>
                <li class="item-type listing_type"><?php echo homey_taxonomy_simple('listing_type'); ?></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</div><!-- .item-wrap -->