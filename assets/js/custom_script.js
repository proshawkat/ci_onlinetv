// JavaScript Document
 jQuery(window).load(function() { // makes sure the whole site is loaded      
    jQuery('#aa-preloader-area').delay(3000).fadeOut('slow'); // will fade out      
  })


// responsive menu var
 $(document).ready(function(){ 
  var touch   = $('#resp-menu');
  var menu  = $('.menu');
 
  $(touch).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle();
  });
  
  $(window).resize(function(){
    var w = $(window).width();
    if(w > 767 && menu.is(':hidden')) {
      menu.removeAttr('style');
    }
  });
  
});
