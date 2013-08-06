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


  $('.tours .tour').hover(function() {
    var height = $(this).height();
    var fg = $(this).find('.foreground');
    var abs = $(this).find('.abs');
    abs.hide();
    fg.hide().height(height).show();
  }, function() {
    var abs = $(this).find('.abs');
    var fg = $(this).find('.foreground');
    abs.show();
    fg.hide();
  });
});
