	<div id="Nightsbridge_custom" class="row NBcaller">
		<div class="col-xs-12">
			<div><h3>Check Availability and Book Now</h3></div>

		<div class="col-sm-6 col-xs-12">
			<div id="single-listing-date-range" class="search-date-range">

				<div class="search-date-range-arrive">
					<input name="arrive" id="1startDate" value="<?php echo esc_attr($prefilled['arrive']); ?>" readonly type="text" class="form-control check_in_date" autocomplete="off" placeholder="<?php echo esc_attr(homey_option('srh_arrive_label')); ?>">
				</div>
				<div class="search-date-range-depart">
					<input name="depart" id="1endDate" value="<?php echo esc_attr($prefilled['depart']); ?>" readonly type="text" class="form-control check_out_date" autocomplete="off" placeholder="<?php echo esc_attr(homey_option('srh_depart_label')); ?>">
				</div>

				<div id="single-booking-search-calendar" class="search-calendar single-listing-booking-calendar-js clearfix" style="display: none;">
					<?php
									$booking_type = homey_booking_type_by_id($listing_id);
									if($booking_type == 'per_day_date'){
										homeyAvailabilityCalendarDayDate();
									}else{
										homeyAvailabilityCalendar();
									}
									?>

					<div class="calendar-navigation custom-actions">
						<button class="listing-cal-prev btn btn-action pull-left disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
						<button class="listing-cal-next btn btn-action pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
					</div><!-- calendar-navigation -->
				</div>
			</div>
			
		</div>
		<div class="col-sm-6 col-xs-12">
			<button type="button" data-toggle="modal" data-target="#nightsbridge_modal" class="trigger-overlay btn btn-primary NBbutton_sidebar" onClick="newSrc();"><i class="fas fa-hand-pointer-o"></i> Check Now</button>
		</div>
		<div class="col-xs-12"><a href="/frequently-asked-questions" target="_blank">Read more about our Online Bookings system here</a></div>
		</div>
	</div>