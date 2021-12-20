
$(window).scroll(function (e) {
  var st = $(window).scrollTop();
  hw = $(window).height();
  if (st > $('#services .wp-srvs').offset().top - (hw + 40)) {
    $('#services .half').removeClass('fx');
    $('#services').css('background-position', 'center ' + (st + hw - $('#services .wp-srvs').offset().top) * -
      0.1 + 'px');
  }
  if (st > $('#arlo').offset().top - hw) {
    $('#arlo .alquileres').css('top', (st - hw) * -0.1 + 'px');
    $('#arlo .arlotour').css('top', (st - hw) * -0.15 + 'px');
    $('#arlo .border-red').css('margin-top', (st - hw) * -0.05 + 'px');
    $('#arlo .clubarloeyx').css('top', (st - hw) * -0.2 + 'px');
  }

});
var vid = document.getElementById('vid');
$('.ver-video').on('click', function (e) {
  e.preventDefault();
  $('#video').fadeIn(300, function () {
    vid.play();
  });
});
$('#video').on('click', function () {
  vid.pause();
  $(this).fadeOut(300);
});
