jQuery(document).ready(function($) {

/* Mobile Nav
========================================================= */
$('.navbar-toggle').click(function() {
  $('.mobile-nav').slideToggle();
  $(this).parent().toggleClass('open');
  return false;
});

/* Close Mobile Nav on-click
========================================================= */
$('.mobile-nav ul li a').click(function() {
  $('.mobile-nav').fadeOut();
  $('.mobile-nav-wrap').removeClass('open');
});

/* Mobile Nav with Nested Sub-Menu's
========================================================= */
$('.mobile-nav ul li').has('ul').prepend('<a href="#" class="expand"></a>');
$('.mobile-nav ul .current-menu-ancestor > .expand').addClass('open');
$('#open-nav, .mobile-nav ul .menu-item-has-children > a.expand').click(function(event) {
  event.preventDefault();
  var current = $(this);
  $("~ ul", current).stop(true,true).slideToggle(200);
  $(current).toggleClass('open');
});


}); // End Document Ready
