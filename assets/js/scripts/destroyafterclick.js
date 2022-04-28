(function($) {
  $( document ).ready(function() {
    $('.js-destroyafterclick').on('click', function() {
      $(this).remove();
    });
  });
}(jQuery));