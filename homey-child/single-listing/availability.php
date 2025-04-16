<?php
global $post, $homey_prefix, $homey_local, $hide_labels;
$min_book_days  = homey_get_listing_data('min_book_days');
$max_book_days  = homey_get_listing_data('max_book_days');
$calselect = get_post_meta( $post->ID, 'homey_showcalendarf612cb56500f84', true );
$nightsbridgeBBID = get_post_meta( $post->ID, 'homey_nightsbridgef5ea9b633deaae', true );
$nightsbridgeRoom = get_post_meta( $post->ID, 'homey_nightsbridge-roomf6203f097cb2df', true );
$show_cal = "";
?>


<?php if($calselect =='NB') :
$calendarHeight = get_post_meta( $post->ID, 'homey_calendar-heightf6204dbc9e7ae8', true );
      if(empty($calendarHeight)) {
          $calendarHeight = '500';

      if (isset($nightsbridgeRoom)) {
          $calendarHeight = '325';
      }}
?>
      <div id="availability-section" class="availability-section">
         <div class="block">
            <div class="block-section">
               <div class="block-body">
                  <div class="block">
                     <h3 class="title">Availability Calendar</h3>
                  </div>
               </div>
            </div>
         </div>
         <div id="nb_gridwidget" class="visible-smm" style="max-width:770px"></div>
         <?php echo '<script type="text/javascript" src="https://www.nightsbridge.co.za/bridge/view?gridwidget=1&nbid=679&bbid='.$nightsbridgeBBID.'&bbrtid='.$nightsbridgeRoom.'&height='.$calendarHeight.'&width=780"></script>' ?>
      </div>

      <!-- Here we added the Nightsbridge Button -->
      <?php
       if (!empty($nightsbridgeBBID)) {
       echo '
             <div class="block"id="AvailabilityButton">
                 <button type="button" data-toggle="modal" data-target="#nightsbridge_modal" class="trigger-overlay btn btn-primary" ><i class="fas fa-hand-pointer-o"></i> Click for Live Pricing & Availability</button>
             </div>
             ';
       }
       ?>

<?php elseif($calselect =='Yes') : ?>
<div id="availability-section" class="availability-section">
   <div class="block">
      <div class="block-section">
         <div class="block-body">
            <div class="block-left">
               <h3 class="title"><?php echo esc_attr(homey_option('sn_availability_label')); ?></h3>
            </div><!-- block-left -->

            <?php if($hide_labels['sn_min_stay_is'] != 1 || $hide_labels['sn_max_stay_is'] != 1) { ?>
            <div class="block-right">
               <ul class="detail-list detail-list-2-cols">
                  <?php if($hide_labels['sn_min_stay_is'] != 1 && !empty($min_book_days)) { ?>
                  <li>
                     <i class="fa fa-calendar-o" aria-hidden="true"></i>
                     <?php echo esc_attr(homey_option('sn_min_stay_is'));?> <strong><?php echo esc_attr($min_book_days); ?> <?php echo esc_attr(homey_get_price_label($min_book_days));?></strong>
                  </li>
                  <?php } ?>

                  <?php if($hide_labels['sn_max_stay_is'] != 1 && !empty($max_book_days)) { ?>
                  <li>
                     <i class="fa fa-calendar-o" aria-hidden="true"></i>
                     <?php echo esc_attr(homey_option('sn_max_stay_is'));?> <strong><?php echo esc_attr($max_book_days); ?> <?php echo esc_attr(homey_get_price_label($max_book_days));?></strong>
                  </li>
                  <?php } ?>
               </ul>
            </div><!-- block-right -->
            <?php } ?>

         </div><!-- block-body -->
         <div class="block-availability-calendars">
            <div class="single-listing-calendar search-calendar clearfix">
               <?php echo esc_attr($show_cal); ?>
               <div class="calendar-arrow"></div>

               <?php homeyAvailabilityCalendar(); ?>

               <div class="availability-notes">
                  <ul class="list-inline">
                     <li class="day-available">
                        <span><?php echo esc_attr(homey_option('sn_avail_label')); ?></span>
                     </li>
                     <li class="day-pending">
                        <span><?php echo esc_attr(homey_option('sn_pending_label')); ?></span>
                     </li>
                     <li class="day-booked">
                        <span><?php echo esc_attr(homey_option('sn_booked_label')); ?></span>
                     </li>
                  </ul>
               </div>

               <div class="calendar-navigation custom-actions">
                  <button class="listing-cal-prev btn btn-action pull-left disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                  <button class="listing-cal-next btn btn-action pull-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
               </div><!-- calendar-navigation -->

            </div>
         </div><!-- block-availability-calendars -->
      </div><!-- block-section -->
   </div><!-- block -->
</div>
<?php else : ?>

<?php endif; ?>