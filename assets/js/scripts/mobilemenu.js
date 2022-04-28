(function($) {
  $( document ).ready(function() {
    $(".js-menu").on("click", function() {
      $("body").toggleClass("menuopen");
      $("body").toggleClass("opensidemenu");
      $(".js-mobilemenu").toggleClass("open");
    });
    
    $( window ).resize(function() {
      $("body").removeClass("menuopen").removeClass("opensidemenu");
    });
    
    $(".js-openmenupage").on("click", function() {
	  		$(this).closest('.mm-page').addClass('hidemenu');
	  		var targetid = $(this).attr('data-target');
	  		$(this).closest('.menu-mob').find(targetid).removeClass('hidemenu');
	  });
	  
	  $(".js-backtomainmenu").on("click", function() {
	  		$(this).closest('.mm-page').addClass('hidemenu');
	  		$(this).closest('.menu-mob').find('#mm-hoofdmenu').removeClass('hidemenu');
	  });
    
  });
}(jQuery));