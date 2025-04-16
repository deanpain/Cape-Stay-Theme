<?php
global $post, $homey_prefix, $homey_local, $hide_labels;
$guests     = homey_get_listing_data('guests');
$bedrooms   = homey_get_listing_data('listing_bedrooms');
$beds       = homey_get_listing_data('beds');
$bathrooms      = homey_get_listing_data('baths');
$room_type  = homey_taxonomy_simple('room_type');
$listing_type = homey_taxonomy_simple('listing_type');



// $full_bath = $half_bath = $type_icon = $acco_icon = $bedroom_icon = $bathroom_icon = '';
// if($bathrooms != '' && $bathrooms != '0') {
//     $baths = explode('.', $bathrooms);
//     $full_bath = $baths[0].' '.homey_option('sn_fullbath_label');
//     if(!empty($baths[1]) && $baths[1] == '5') {
//         $half_bath = '1'.' '.homey_option('sn_halfbath_label');
//     }
// } else {
//     $full_bath = $bathrooms;
// }

$slash = '';
if(!empty($room_type) && !empty($listing_type)) {
    $slash = '/';
}
$icon_type = homey_option('detail_icon_type');

if($icon_type == 'fontawesome_icon') {
    $type_icon = '<i class="'.esc_attr(homey_option('de_type_icon')).'"></i>';
    $acco_icon = '<i class="'.esc_attr(homey_option('de_acco_icon')).'"></i>';
    $bedroom_icon = '<i class="'.esc_attr(homey_option('de_bedroom_icon')).'"></i>';
    $bathroom_icon = '<i class="'.esc_attr(homey_option('de_bathroom_icon')).'"></i>';

} elseif($icon_type == 'custom_icon') {
    $type_icon = '<img src="'.esc_url(homey_option( 'de_cus_type_icon', false, 'url' )).'" alt="'.esc_attr__('type_icon', 'homey').'">';
    $acco_icon = '<img src="'.esc_url(homey_option( 'de_cus_acco_icon', false, 'url' )).'" alt="'.esc_attr__('acco_icon', 'homey').'">';
    $bedroom_icon = '<img src="'.esc_url(homey_option( 'de_cus_bedroom_icon', false, 'url' )).'" alt="'.esc_attr__('bedroom_icon', 'homey').'">';
    $bathroom_icon = '<img src="'.esc_url(homey_option( 'de_cus_bathroom_icon', false, 'url' )).'" alt="'.esc_attr__('bathroom_icon', 'homey').'">';
}
?>


 <?php if($guests != '' || $bedrooms != '' || $bathrooms != '' || $listing_type != '') { ?>

    <div class="block-bordered">

        <?php if($hide_labels['sn_accom_label'] != 1 && $guests != '') { ?>
        <div class="block-col block-col-33">
            <div class="block-icon">
                <?php echo ''.$acco_icon; ?>
            </div>
            <div><?php echo esc_attr(homey_option('sn_accom_label')); ?></div>
            <div><strong><?php echo esc_attr($guests); ?> <?php echo esc_attr(homey_option('sn_guests_label')); ?></strong></div>
        </div>
        <?php } ?>

        <?php if($hide_labels['sn_bedrooms_label'] != 1 && $bedrooms != '') { ?>
        <div class="block-col block-col-33">
            <div class="block-icon">
                <?php echo ''.$bedroom_icon; ?>
            </div>
            <div><?php echo esc_attr(homey_option('sn_bedrooms_label')); ?></div>
            <div><strong><?php echo esc_attr($bedrooms); ?> <?php echo esc_attr(homey_option('sn_bedrooms_label')); ?> / <?php echo esc_attr($beds); ?> <?php echo esc_attr(homey_option('sn_beds_label')); ?></strong></div>
        </div>
        <?php } ?>

        <?php if($hide_labels['sn_bathrooms_label'] != 1 && $bathrooms != '') { ?>
        <div class="block-col block-col-33">
            <div class="block-icon">
                <?php echo ''.$bathroom_icon; ?>
            </div>
            <div><?php echo esc_attr(homey_option('sn_bathrooms_label')); ?></div>
            <div><strong><?php echo esc_attr($bathrooms); ?></strong></div>
        </div>
        <?php } ?>

    </div><!-- block-bordered -->

    <?php } ?>

