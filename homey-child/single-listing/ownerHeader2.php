<?php
global $post, $homey_prefix, $listing_author;
$append = "";
?>
<div class="container" id="host-section">	
	<div class="row">
		<div class="block" id="owner_n_price">
			<div class="block-body">
				<?php
	
				if ($listing_author["name"] == "Cape Stay Reservations") {
				echo '<div class="col-sm-7 col-xs-12">
						<div class="host-section">
							<div class="col-sm-12 col-xs-12"><h3 class="title">'.esc_attr(homey_option('sn_hosted_by')).' Cape Stay Rentals</h3></div>
							<div class="col-sm-12 col-xs-12">Email us at <a href="mailto:res@capestay.co.za?subject=';
							the_title();
							echo ' booking from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">res@capestay.co.za</a>.
							Call us on <a href="tel:+27-021-3000-777">+27-021-3000-777</a></div>
						</div>
					</div>
	
				<!-- end host section -->';
				} else {
	
	
	
					$PropAuthor = get_post_meta( $post->ID, 'homey_contact-personf60d2c8a85b056', true );
					$PropPhone = get_post_meta( $post->ID, 'homey_contact-phonef60d2c8d749370', true );
					$PropCell = get_post_meta( $post->ID, 'homey_contact-cellf60d2c8e3a966c', true );
					//$PropCell = $PropCell . " or";
					
					if (!empty($PropPhone)) {
					$append = " or ";
					}
					
					$PropEmail = get_post_meta( $post->ID, 'homey_contact-emailf60d2c912834ef', true );
	
					if($PropAuthor || $PropEmail || $PropPhone || $PropCell){
	
						echo '<div class="col-sm-7 col-xs-12">
						<div class="host-section">
	
										<div class="col-sm-12 col-xs-12"><h3 class="title">'.esc_attr(homey_option('sn_hosted_by')).' <span>'.esc_attr($PropAuthor).'</h3></div>
										<div class="col-sm-12 col-xs-12">Email us at <a href="mailto:'.antispambot($PropEmail).'?subject=';
										the_title();
										echo ' booking from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($PropEmail).'</a>.
										Call us on <a href="tel:'.$PropCell.'">'.$PropCell.'</a>'.$append.'<a href="tel:'.$PropPhone.'">'.$PropPhone.'</a>
										</div>
	
						</div>
						</div>
						<!-- end host section -->';
	
					}
				}
				?>
				<div class="col-sm-5 col-xs-12">
				<?php get_template_part("single-listing/title_about"); ?>
				</div>
			</div>
		</div>
	</div>
</div>
