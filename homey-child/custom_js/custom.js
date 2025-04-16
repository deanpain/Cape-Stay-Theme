(function($) {
$(document).ready(function() {


// Click function for show the Modal popup for the Nightsbridge Iframe

$(".NBbutton").on("click", function(){
  $(".mask").addClass("active");
});

// Function for close the Modal

function closeModal(){
  $(".mask").removeClass("active");
}

// Call the closeModal function on the clicks/keyboard

$(".NBclose, .mask").on("click", function(){
  closeModal();
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    closeModal();
  }
});



})
})(jQuery);

// Toggle Element Visibility via JavaScript - Map Reveal Button
// https://perishablepress.com/press/2008/04/29/toggle-element-visibility-via-javascript/

function toggle(x,y,z) {
  if (document.getElementById(x).style.display == 'none') {
    document.getElementById(x).style.display = '';
    document.getElementById(y).style.width = '';
    document.getElementById(y).style.height = '';
    document.getElementById(z).value = 'Close Map';
  } else {
    document.getElementById(x).style.display = 'none';
    document.getElementById(y).style.width = '100%';
    document.getElementById(y).style.transition = '0.5s';
    document.getElementById(z).value = 'Open Map';
    document.getElementById(y).style.height = 'auto';
  }
}