<?php
global $post, $homey_prefix, $listing_author;
$address = homey_get_listing_data('listing_address');

$is_superhost = $listing_author['is_superhost'];

$rating = homey_option('rating');
$total_rating = get_post_meta( $post->ID, 'listing_total_rating', true );
?>
<div class="title-section">
    <div class="block block-top-title">
        <div class="block-body">
            
            <h1 class="listing-title">
                <?php the_title(); ?><?php homey_listing_featured(get_the_ID()); ?>    
            </h1>
            <?php if(!empty($address)) { ?>
            <address><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_attr($address); ?></address>
            <?php } ?>
            <br><br>
            <?php get_template_part('template-parts/breadcrumb');
             
                if(homey_option('detail_share') != 0) {
                    get_template_part('single-listing/share'); 
                }
                ?>

            <?php if($rating && ($total_rating != '' && $total_rating != 0 ) ) { ?>
            <div class="list-inline rating hidden-xs">
                <?php echo homey_get_review_stars($total_rating, true, true); ?>
            </div>
            <?php } ?>

        </div><!-- block-body -->
    </div><!-- block -->
</div><!-- title-section -->