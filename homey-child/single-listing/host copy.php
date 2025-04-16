<?php
global $post, $homey_prefix, $homey_local, $listing_author;

$street_address  =  get_the_author_meta( $homey_prefix.'street_address');

$is_superhost = $listing_author['is_superhost'];
$doc_verified = $listing_author['doc_verified'];

$verified = false;
if($doc_verified) {
    $verified = true;
}

if ($listing_author['name'] != "admin") {

    $PropAuthor = get_post_meta( $post->ID, 'homey_contact-personf60d2c8a85b056', true );
    $PropPhone = get_post_meta( $post->ID, 'homey_contact-phonef60d2c8d749370', true );
    $PropCell = get_post_meta( $post->ID, 'homey_contact-cellf60d2c8e3a966c', true );
    $PropEmail = get_post_meta( $post->ID, 'homey_contact-emailf60d2c912834ef', true );

    if($PropAuthor || $PropEmail || $PropPhone || $PropCell){

        echo '<div id="host-section" class="host-section">
        <div class="block">
            <div class="block-body">
                <div class="media">
                    <div class="media-left">
                        '.$listing_author['photo'].'
                    </div>
                    <div class="media-body">
                        <h5>'.esc_attr(homey_option('sn_hosted_by')).' <span>'.esc_attr($PropAuthor).'</span></h5>
                        <!-- <dd class="text-success"><i class="fa fa-check-circle-o"></i>'.esc_attr(homey_option('sn_pr_verified')).'</dd> -->
                        <p><a href="mailto:'.antispambot($PropEmail).'?subject=';
                        the_title(); 
                        echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($PropEmail).'</a><br>
                        <a href="tel:'.$PropPhone.'">'.$PropPhone.'</a></br>  
                        <a href="tel:'.$PropCell.'">'.$PropCell.'</a>

                        </p>
                    </div>
                </div>
            </div><!-- block-body -->
        </div><!-- block -->
        </div><!-- end host section -->'
        ;
    }else{
        echo '<div id="host-section" class="host-section">
        <div class="block">
            <div class="block-body">
                <div class="media">
                    <div class="media-left">
                        '.$listing_author['photo'].'
                    </div>
                    <div class="media-body">
                        <h5>'.esc_attr(homey_option('sn_hosted_by')).' <span>'.esc_attr($listing_author['name']).'</span></h5>
                        <!-- <dd class="text-success"><i class="fa fa-check-circle-o"></i>'.esc_attr(homey_option('sn_pr_verified')).'</dd> -->
                        <p><a href="mailto:'.antispambot($listing_author['email']).'?subject=';
                        the_title(); 
                        echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($listing_author['email']).'</a><br>
                        <a href="tel:'.$listing_author['native_language'].'">'.$listing_author['other_language'].'</a></br>  
                        <a href="tel:'.$listing_author['other_language'].'">'.$listing_author['native_language'].'</a>

                        </p>
                    </div>
                </div>
            </div><!-- block-body -->
        </div><!-- block -->
        </div><!-- end host section -->'
        ;                 
    }
}
?>

