(function($) {
  $( document ).ready(function() {
    $('.js-slick').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 6,
      prevArrow: true,
      nextArrow: true,
      settings: "unslick",
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 100,
          settings: "unslick",
          infinite: true,
        }
      ]
    });

  });
}(jQuery));