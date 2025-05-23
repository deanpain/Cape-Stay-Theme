<?php
global $post, $homey_prefix, $homey_local, $hide_labels;
$smoke            = homey_get_listing_data('smoke');
$pets             = homey_get_listing_data('pets');
$party            = homey_get_listing_data('party');
$children         = homey_get_listing_data('children');
$additional_rules = homey_get_listing_data('additional_rules');
$cancellation_policy = homey_get_listing_data('cancellation_policy');

if($smoke != 1) {
    $smoke_allow = 'fa fa-times'; 
    $smoke_text = homey_option('sn_text_no');
} else {
    $smoke_allow = 'fa fa-check';
    $smoke_text = homey_option('sn_text_yes');
}

if($pets != 1) {
    $pets_allow = 'fa fa-times';
    $pets_text = homey_option('sn_text_no');
} else {
    $pets_allow = 'fa fa-check';
    $pets_text = homey_option('sn_text_yes');
}

if($party != 1) {
    $party_allow = 'fa fa-times'; 
    $party_text = homey_option('sn_text_no');
} else {
    $party_allow = 'fa fa-check';
    $party_text = homey_option('sn_text_yes');
}

if($children != 1) {
    $children_allow = 'fa fa-times';
    $children_text = homey_option('sn_text_no');
} else {
    $children_allow = 'fa fa-check';
    $children_text = homey_option('sn_text_yes');
}
?>
<div id="rules-section" class="rules-section">
    <div class="block">
        <div class="block-section">
            <div class="block-body">

                    <h3 class="title"><?php echo esc_attr(homey_option('sn_terms_rules')); ?></h3>


                    <ul class="rules_list detail-list">
                        <?php if($hide_labels['sn_smoking_allowed'] != 1) { ?>
                        <li>
                            <i class="<?php echo esc_attr($smoke_allow); ?>" aria-hidden="true"></i> 
                            <?php echo esc_attr(homey_option('sn_smoking_allowed')); ?>:
                            <strong><?php echo esc_attr($smoke_text); ?></strong>
                        </li> 
                        <?php } ?>

                        <?php if($hide_labels['sn_pets_allowed'] != 1) { ?>                   
                        <li>
                            <i class="<?php echo esc_attr($pets_allow); ?>" aria-hidden="true"></i> 
                            <?php echo esc_attr(homey_option('sn_pets_allowed')); ?>:
                            <strong><?php echo esc_attr($pets_text); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if($hide_labels['sn_party_allowed'] != 1) { ?>
                        <li>
                            <i class="<?php echo esc_attr($party_allow); ?>" aria-hidden="true"></i> 
                            <?php echo esc_attr(homey_option('sn_party_allowed')); ?>:
                            <strong><?php echo esc_attr($party_text); ?></strong>
                        </li>
                        <?php } ?>

                        <?php if($hide_labels['sn_children_allowed'] != 1) { ?>
                        <li>
                            <i class="<?php echo esc_attr($children_allow); ?>" aria-hidden="true"></i> 
                            <?php echo esc_attr(homey_option('sn_children_allowed')); ?>:
                            <strong><?php echo esc_attr($children_text); ?></strong>
                        </li>
                        <?php } ?>
                    </ul>

                    <?php if( (!empty($additional_rules) && $hide_labels['sn_add_rules_info'] != 1) || !empty($cancellation_policy)) { ?>
                    <ul class="detail-list">

                        <?php if(!empty($cancellation_policy)) { ?>
                            <li><strong><?php echo esc_attr($homey_local['cancel_policy']); ?></strong></li>
                            <li><?php echo esc_html($cancellation_policy); ?></li>
                        <?php } ?>

                        <?php if(!empty($additional_rules) && $hide_labels['sn_add_rules_info'] != 1) { ?>
                        <li><strong><?php echo esc_attr(homey_option('sn_add_rules_info')); ?></strong></li>
                        <p class="rules-additional"><?php echo ''.($additional_rules); ?></p>
                        <?php } ?>
                    </Ul>
                    <?php } ?>


            </div><!-- block-body -->
        </div><!-- block-section -->
    </div><!-- block -->
</div>