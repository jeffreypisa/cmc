(function($) {
  $( document ).ready(function() {
	  $(window).scroll(function() {
		  var scrollTop = $(this).scrollTop();
		  if ($('.mod-slider').hasClass('mod-pageheader')) {	  
				$('.mod-pageheader .slide .bg').css({
				  opacity: function() {
				    var elementHeight = $(this).height(),
				        opacity = ((0 + (elementHeight - scrollTop) / elementHeight) * 1);
				
				    return opacity;
				  }
				});
		  }
		  else {
				$('.mod-slider .carousel-inner').css({
				  opacity: function() {
				    var elementHeight = $(this).height(),
				        opacity = ((0 + (elementHeight - scrollTop) / elementHeight) * 1);
				
				    return opacity;
				  }
				});
			}
		});
  });
}(jQuery));