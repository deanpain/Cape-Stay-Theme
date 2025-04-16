<?php 
	$nightsbridgeBBID                 = get_post_meta($post->ID, 'homey_nightsbridgef5ea9b633deaae', true);
	$nightsbridgeRoom                 = get_post_meta($post->ID, 'homey_nightsbridge-roomf6203f097cb2df', true);
?>
<script type="text/javascript">
function newSrc() {
  var a = document.querySelector('input[name=arrive]').value
  var b = document.querySelector('input[name=depart]').value

  //var c = $("#" + attName + " input:first").text();
  
  
  var nightsbridgeBBID = <?php echo json_encode($nightsbridgeBBID); ?>;
  var nightsbridgeRoom = <?php echo json_encode($nightsbridgeRoom); ?>;

  //var attData = document.querySelector('input[name=arrive]').value
	//alert(attData);



  var newSrc =
	"https://book.nightsbridge.com/" + nightsbridgeBBID + "?startdate=" +
	a +
	"&enddate=" +
	b +
	"&nbid=679&bbrtid=" + nightsbridgeRoom + "&width=780";
	//"&nbid=679";

	//alert(newSrc);
  document.getElementById("NBframe").src = newSrc;
}
</script>



<div class="modal fade custom-modal-contact-host" id="nightsbridge_modal" tabindex="-1" role="dialog" style="display: none;">
	<div class="NBmodal" role="alert">
		<div class="NBheader modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h3 class="modal-title">Secure Bookings Via Nightsbridge</h3>
		</div>
		<?php 
		
		echo
		'
		<iframe id="NBframe"
		src="https://book.nightsbridge.com/' . $nightsbridgeBBID . '
		?startdate=' . $_GET['arrive'] .'&enddate=' . $_GET['depart'] .'
		&nbid=679&bbrtid=' . $nightsbridgeRoom . '
		"
		>
		</iframe>
		';
		?>
	</div>
</div>