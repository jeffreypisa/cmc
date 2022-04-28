(function($) {
  $( document ).ready(function() {
		// this function must be defined in the global scope.   onload="fadeIn(this)" 
		window.fadeIn = function(obj) {
		    $(obj).fadeIn(1000);
		};
  });
}(jQuery));