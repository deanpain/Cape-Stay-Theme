<div id="single-listing-date-range" class="search-date-range">

			<div class="search-date-range-arrive">
			  <input name="arrive" id="1startDate" value="" readonly type="text" class="form-control check_in_date" autocomplete="off" placeholder="<?php echo esc_attr(homey_option('srh_arrive_label')); ?>">
			</div>
			<div class="search-date-range-depart">
			  <input name="depart" id="1endDate" value="" readonly type="text" class="form-control check_out_date" autocomplete="off" placeholder="<?php echo esc_attr(homey_option('srh_depart_label')); ?>">
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