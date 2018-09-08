jQuery(document).ready(function($) {

/* Mobile Nav Toggle
========================================================= */
$('.navbar-toggle').click(function() {
  $('.mobile-nav').fadeToggle();
  $(this).parent().toggleClass('open');
  $('.sub-menu').removeClass('sub-open');
  return false;
});

/* Mobile Nav with Flyout Menus
========================================================= */
$('.mobile-nav ul li').has('ul').prepend('<a href="#" class="expand"></a>');
$('.mobile-nav .sub-menu').prepend('<a href="#" class="close-sub"></a>');
$('.mobile-nav ul .menu-item-has-children > a.expand').click(function(e) {
  var current = $(this);
  e.preventDefault();
  $("~ ul", current).toggleClass('sub-open');
  $(current).toggleClass('expand-open');
});
$('.close-sub').click(function(e){
  e.preventDefault();
  $(this).parent().removeClass('sub-open');
});

/* Add Class to Header on Scroll
========================================================= */
$(window).scroll(function(){
  var currentPos = $(this).scrollTop();
  if (currentPos > 0)
    $("header").addClass("nav-sticky");
  else
    $("header").removeClass("nav-sticky");
});


}); // End Document Ready
