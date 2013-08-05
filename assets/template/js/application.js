$(function() {

  $('.slider').owlCarousel({
    items: 1,
    navigation: true,
    paginationNumbers: true,
    autoPlay: true,
    navigationText: ['<', '>']
  });
  var owl = $('.slider').data('owlCarousel');

  owl.play();
});
