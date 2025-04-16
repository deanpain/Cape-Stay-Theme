<?php
global $post, $homey_prefix, $homey_local, $listing_author;

$street_address  =  get_the_author_meta( $homey_prefix.'street_address');

$is_superhost = $listing_author['is_superhost'];
$doc_verified = $listing_author['doc_verified'];

$verified = false;
if($doc_verified) {
    $verified = true;
}


if ($listing_author['name'] == "Cape Stay Reservations") {

    echo '<div id="host-section" class="host-section">

                        <h3>'.esc_attr(homey_option('sn_hosted_by')).' <span>Cape Stay Rentals</span></h3>
                        <p>Email us at <a href="mailto: res@capestay.co.za?subject=';
                        the_title();
                        echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">res@capestay.co.za<br></a>
                        or call us on <a href="tel:+27-021-3000-777">+27-021-3000-777</a></br>
                        </p>
        </div><!-- end host section -->'
        ;



}
else {
    $PropAuthor = get_post_meta( $post->ID, 'homey_contact-personf60d2c8a85b056', true );
    $PropPhone = get_post_meta( $post->ID, 'homey_contact-phonef60d2c8d749370', true );
    $PropCell = get_post_meta( $post->ID, 'homey_contact-cellf60d2c8e3a966c', true );
    $PropEmail = get_post_meta( $post->ID, 'homey_contact-emailf60d2c912834ef', true );

    if($PropAuthor || $PropEmail || $PropPhone || $PropCell){

        echo '<div id="host-section" class="host-section">

                        <h3>'.esc_attr(homey_option('sn_hosted_by')).' <span>'.esc_attr($PropAuthor).'</span></h3>
                        <p>Email us at <a href="mailto:'.antispambot($PropEmail).'?subject=';
                        the_title();
                        echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($PropEmail).'<br></a>
                        or call us on <a href="tel:'.$PropCell.'">'.$PropCell.'</a> or <a href="tel:'.$PropPhone.'">'.$PropPhone.'</a>
                        </p>

        </div><!-- end host section -->'
        ;
    }
}
?>

