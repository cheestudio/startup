jQuery(document).ready(function($) {

/* Get Cookie function
========================================================= */
function getCookie(name) {
  var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
  return v ? v[2] : null;
}

/* Set Cookie function
========================================================= */
function setCookie(name, value, days) {
  var d = new Date;
  d.setTime(d.getTime() + 24*60*60*1000*days);
  document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}

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

/* Sub Navigation Titles on Mobile Nav */

$('.mobile-nav ul li.menu-item-has-children').each(function(){
  var navSectionTitle = $(this).find('.expand').next().html();
  $(this).find('.sub-menu').prepend('<div class="sub-menu-title">' + navSectionTitle + '</div>');
});


}); // End Document Ready
