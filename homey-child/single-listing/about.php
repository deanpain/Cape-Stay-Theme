
<div id="about-section" class="about-section">



    <div class="block">
        <div class="block-body">
            <?php the_content(); ?>
        </div>
    </div><!-- block-body -->


    <?php
    //Custom Fields
    if(class_exists('Homey_Fields_Builder')) {
    $fields_array = Homey_Fields_Builder::get_form_fields();

        if(!empty($fields_array)) {
            foreach ( $fields_array as $value ) {
                $data_value = get_post_meta( get_the_ID(), 'homey_'.$value->field_id, true );
                $field_title = $value->label;
                $field_type = $value->type;

                $field_title = homey_wpml_translate_single_string($field_title);
                $data_value = homey_wpml_translate_single_string($data_value);



                if($field_type == 'textarea') {
                    if(!empty($data_value) && $hide_labels[$value->field_id] != 1) {
                        echo '
                        <div class="block">
                            <div class="block-body">
                                <h2>'.esc_attr($field_title).'</h2>
                                '.$data_value.'
                            </div>
                        </div>
                        ';
                    }
                }
            }
        }
    }
    ?>

</div>