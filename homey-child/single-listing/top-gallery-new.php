<?php
global $post;
$size = 'homey-gallery';
$thumb_size = 'homey-gallery-thumb2';
$listing_images = rwmb_meta( 'homey_listing_images', 'type=plupload_image&size='.$size, $post->ID );
$thumbs = rwmb_meta( 'homey_listing_images', 'type=plupload_image&size='.$thumb_size, $post->ID );
if( has_post_thumbnail( $post->ID ) ) {
    $featured_img = wp_get_attachment_image_url( get_post_thumbnail_id(),'full' );
} else {
    $featured_img = homey_get_image_placeholder_url( 'homey-gallery' );
}
$i = 0;

if(!empty($listing_images)) {
    ?>

    <div id="gallery-section" class="container top-gallery">
        <div class="row">
            <div class="col-sm-6 col-xs-12">

                <a data-fancy-image-index="-1" href="<?php echo esc_url($featured_img); ?>" class="fanboxTopGallery-item swipebox">
                <img src="<?php echo esc_url($featured_img); ?>" />
                </a>


            </div>

                <!-- top-gallery-section -->
                <?php 
                $size = 'homey-gallery';
                $thumb_size = 'homey-gallery-thumb2';
                $listing_images = rwmb_meta( 'homey_listing_images', 'type=plupload_image&size='.$size, $post->ID );
                fancybox_gallery_html($listing_images, 'fanboxTopGallery');//hidden images for gallery fancybox 3 ?>
                <?php } ?>



                <div class="col-sm-6 col-xs-12 smaller_thumbs">
                        <?php
                        get_template_part('single-listing/gallery2');
                         ?>
                </div>

        </div>
     </div>