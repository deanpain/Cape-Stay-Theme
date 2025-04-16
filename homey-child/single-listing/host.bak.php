<?php
global $post, $homey_prefix, $homey_local, $listing_author;

$street_address  =  get_the_author_meta( $homey_prefix.'street_address');

$is_superhost = $listing_author['is_superhost'];
$doc_verified = $listing_author['doc_verified'];

$verified = false;
if($doc_verified) {
    $verified = true;
}
?>
<div id="host-section" class="host-section">
    <div class="block">
        <div class="block-body">

            <!-- Here we added the AirBnb and WhatsApp Button and link-->
            <?php 
                if(class_exists('Homey_Fields_Builder')) {
                $fields_array = Homey_Fields_Builder::get_form_fields(); 

                    if(!empty($fields_array)) {
                        foreach ( $fields_array as $value ) {
                            $data_value = get_post_meta( get_the_ID(), 'homey_'.$value->field_id, true );
                            $field_title = $value->label;
                            $field_type = $value->type;
                            
                            $field_title = homey_wpml_translate_single_string($field_title);
                            $data_value = homey_wpml_translate_single_string($data_value);

                            
                            if($field_title == 'AirBnB Link (optional)') {
                                if(!empty($data_value)) {
                                    echo '<a href="'.esc_attr( $data_value ).'" target="_blank" title ="Book via AirBnB""><img src="https://www.capestay.co.za/wp-content/uploads/logos/airbnb_l.png" style="float:right"></a>';
                                }
                            }
                            if($field_title == 'WhatsApp (Optional)') {
                                if(!empty($data_value)) {
                                    echo '<a href="https://web.whatsapp.com/send?phone='.esc_attr( $data_value ).'&text=Hello%2C+I+want+to+chat+to+about+your+listing+on+Cape+Stay." target="_blank" title ="Chat to Us"" class="hide-on-mobile-tablet"><img src="https://www.capestay.co.za/wp-content/uploads/logos/whatsapp_l.png" style="float:right"></a>';
                                }
                            }
                        }
                    }
                }
                ?>

            <div class="media">
                <div class="media-left">
                    <?php echo ''.$listing_author['photo']; ?>
                </div>
                <div class="media-body">
                    <h3><?php echo esc_attr(homey_option('sn_hosted_by')); ?> <span><?php echo esc_attr($listing_author['name']); ?></span>
                    </h3>
                    <?php echo '<p><a href="mailto:'.antispambot($listing_author['email']).'?subject=';
                    the_title(); 
                    echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($listing_author['email']).'</a><br>
                    <a href="tel:'.$listing_author['other_language'].'">'.$listing_author['other_language'].'</a></br>
                    <a href="tel:'.$listing_author['native_language'].'">'.$listing_author['native_language'].'</a>
                    </p>'
                    ?>
                </div>
            </div>
        </div><!-- block-head -->
    </div><!-- block -->
    </div><!-- end host section -->
