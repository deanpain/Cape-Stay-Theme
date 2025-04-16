<?php
	$PropAuthor = get_post_meta( $post->ID, 'homey_contact-personf60d2c8a85b056', true );
	$PropPhone = get_post_meta( $post->ID, 'homey_contact-phonef60d2c8d749370', true );
	$PropCell = get_post_meta( $post->ID, 'homey_contact-cellf60d2c8e3a966c', true );
	$PropEmail = get_post_meta( $post->ID, 'homey_contact-emailf60d2c912834ef', true );

	if($PropAuthor || $PropEmail || $PropPhone || $PropCell){

		echo '<div class="col-md-4">
		<div id="host-section" class="host-section">

						<p class="host_span">'.esc_attr(homey_option('sn_hosted_by')).' <span>'.esc_attr($PropAuthor).'</span></p>
						<p>Email us at <a href="mailto:'.antispambot($PropEmail).'?subject=';
						the_title();
						echo ' enquiry from Cape Stay website&amp;bcc=bookingscapestay@gmail.com">'.antispambot($PropEmail).'</p></a>
						<p>Call us on <a href="tel:'.$PropPhone.'">'.$PropPhone.'</a> or
						<a href="tel:'.$PropCell.'">'.$PropCell.'</a></p>

		</div>
		</div>
		<!-- end host section -->'
		;
	}
?>