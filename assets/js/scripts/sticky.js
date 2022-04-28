(function($) {
  $(document).ready(function(){

		// Hide header on scroll down
		var didScroll;
		var lastScrollTop = 0;
		var delta = 5;
		var navbarHeight = $('header').outerHeight();
		
		$(window).scroll(function(){
		    didScroll = true;
		});
		
		setInterval(function() {
		    if (didScroll) {
		        hasScrolled();
		        didScroll = false;
		    }
		}, 250);
		
		function hasScrolled() {
		    var st = $(this).scrollTop();
		    
		    // Make scroll more than delta
		    if(Math.abs(lastScrollTop - st) <= delta) {
		        return;
		    }
		    

		    
		    if (st > lastScrollTop && st > navbarHeight) {
	        // Scroll Down
	        $('header').removeClass('is_stuck').addClass('gone');
		    } else {
	        // Scroll Up
	        if(st + $(window).height() < $(document).height()) {
	            $('header').removeClass('gone').addClass('is_stuck');
	        }
		    }
		  
		    lastScrollTop = st;
		    

		    if(st < navbarHeight) {
		      $('header').removeClass('is_stuck').removeClass('gone');
		    }
		}
  });
}(jQuery));


