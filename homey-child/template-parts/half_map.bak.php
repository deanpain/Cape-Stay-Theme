<?php
global $post, $wp_query, $paged;
$zoom_level = homey_option('halfmap_zoom_level');
$search_layout = homey_option('search_posts_layout');
$search_num_posts = homey_option('search_num_posts');
$search_default_order = homey_option('search_default_order');

$match_height_class = '';
if($search_layout == 'grid') {
    $match_height_class = 'homey-matchHeight-needed-ignore';
}
?>

<section class="half-map-wrap map-on-right clearfix">
        
    <div class="half-map-right-wrap" id="metaMap">
        <div id="homey-halfmap" 
            data-zoom="<?php echo intval($zoom_level); ?>"
            data-layout="<?php echo esc_attr($search_layout); ?>"
            data-num-posts="<?php echo esc_attr($search_num_posts); ?>"
            data-order="<?php echo esc_attr($search_default_order); ?>"
        >
        </div>
        <?php get_template_part('template-parts/map-controls'); ?>
    </div><!-- .half-map-right-wrap -->

    <div class="half-map-left-wrap" id="leftList">
        
        <?php get_template_part('template-parts/search/search-half-map'); ?>
        <?php get_template_part('template-parts/listing/sort-tool_2'); ?>

        <div id="homey_halfmap_listings_container" class="listing-wrap item-<?php echo esc_attr($search_layout);?>-view <?php echo esc_attr($match_height_class); ?>">
            
        </div><!-- grid-listing-page -->
    </div><!-- .half-map-left-wrap -->
    
</section><!-- .half-map-wrap -->
<!-- .footer -->


<?php
$copy_rights = homey_option('copy_rights');
global $homey_local;    

$footer_cols = homey_option('footer_cols');
?>
<footer class="footer-wrap footer">
    <?php
    if ( is_active_sidebar( 'footer-sidebar-1' )
    || is_active_sidebar( 'footer-sidebar-2' )
    || is_active_sidebar( 'footer-sidebar-3' )
    || is_active_sidebar( 'footer-sidebar-4' ) ) { ?>

    <div class="footer-top-wrap">
        <div class="container">
            <div class="row">
                <?php
                if( $footer_cols === 'one_col' ) {
                    if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                        echo '<div class="col-md-12 col-sm-12">';
                            dynamic_sidebar( 'footer-sidebar-1' );
                        echo '</div>';
                    }
                } elseif( $footer_cols === 'two_col' ) {
                    if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                        echo '<div class="col-md-6 col-sm-12">';
                            dynamic_sidebar( 'footer-sidebar-1' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                        echo '<div class="col-md-6 col-sm-12">';
                            dynamic_sidebar( 'footer-sidebar-2' );
                        echo '</div>';
                    }
                } elseif( $footer_cols === 'three_cols_middle' ) {
                    if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                        echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-1' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                        echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-2' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                        echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-3' );
                        echo '</div>';
                    }
                } elseif( $footer_cols === 'three_cols' ) {
                    if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                        echo '<div class="col-md-3 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-1' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                        echo '<div class="col-md-3 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-2' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                        echo '<div class="col-md-6 col-sm-12 col-xs-12">';
                            dynamic_sidebar( 'footer-sidebar-3' );
                        echo '</div>';
                    }
                } elseif( $footer_cols === 'four_cols' ) {
                    if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">';
                            dynamic_sidebar( 'footer-sidebar-1' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">';
                            dynamic_sidebar( 'footer-sidebar-2' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">';
                            dynamic_sidebar( 'footer-sidebar-3' );
                        echo '</div>';
                    }
                    if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
                        echo '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">';
                            dynamic_sidebar( 'footer-sidebar-4' );
                        echo '</div>';
                    }
                }
                ?>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- footer-top-wrap -->
    <?php } ?>
    
    <div class="footer-bottom-wrap">
        <div class="container">
            <div class="row">
                <?php if( homey_option('social-footer') != '0' ) { ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php } else { ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php } ?>
                    <div class="footer-copyright">
                        <?php echo esc_html($copy_rights); ?> 
                    </div>
                </div><!-- col-xs-12 col-sm-6 col-md-6 col-lg-6 -->
                <?php if( homey_option('social-footer') != '0' ) { ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="social-footer">
                        <?php get_template_part('template-parts/footer/social');?>
                    </div>
                </div><!-- col-xs-12 col-sm-6 col-md-6 col-lg-6 -->
                <?php } ?>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- footer-bottom-wrap -->
</footer><!-- footer-wrap -->