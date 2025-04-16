<?php
global $post, $homey_prefix, $listing_author;
$address = homey_get_listing_data('listing_address');

$is_superhost = $listing_author['is_superhost'];

$rating = homey_option('rating');
$total_rating = get_post_meta( $post->ID, 'listing_total_rating', true );

$mycity = homey_taxonomy_simple('listing_city');


$lowercaseVariable = strtolower($mycity);


?>
<div id="title-section" class="container">
    <div class="block block-top-title">

        <div class="block-body">
            <div>
                <h1 class="listing-title">
                    <?php the_title(); ?> <?php homey_listing_featured(get_the_ID()); ?>
                </h1>

                <?php if(!empty($address)) { ?>
                <address><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_attr($address); ?>: in the suburb of <a href="/<?php echo $lowercaseVariable; ?>" target="_blank" title="Show all listings in this Suburb"><?php echo $mycity; ?></a></address>
                <?php } ?>
                <?php get_template_part('template-parts/breadcrumb'); ?>
                
            </div>
        </div>    <!-- block-body -->
    </div><!-- block -->
</div><!-- title-section -->