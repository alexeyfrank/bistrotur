$(function() {

  $('.slider').owlCarousel({
    items: 1,
    itemsDesktop: [1024, 1],
    navigation: true,
    paginationNumbers: true,
    autoPlay: true,
    navigationText: ['<', '>']
  });
  var owl = $('.slider').data('owlCarousel');

  $('.slide:eq(0)').find('.subitems').show();
  if (owl) {
    owl.play();
  }


  $('.tours .tour').hover(function() {
    var height = $(this).height();
    var width = $(this).width();
    var fg = $(this).find('.foreground');
    var abs = $(this).find('.abs');
    abs.hide();
    fg.hide().height(height).width(width).show();
  }, function() {
    var abs = $(this).find('.abs');
    var fg = $(this).find('.foreground');
    abs.show();
    fg.hide();
  });

  //$('.modal').modal();


  $('.tours .foreground, .details').click(function(e) {
    var url = $(this).data('href');
    $.get(url, {}, function(response) {
      $('.modal').html(response).modal();
    }, "html");

    e.preventDefault();
  });
});
