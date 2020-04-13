
(function ($) {
  'use-strict'

  //    menu mobile
  $('.header-mobile__toolbar').on('click', function () {
    $('.main-header').toggleClass('menu-mobile-active');
    $('body').toggleClass('active-body');
    $('.mobile-menu-overlay').toggleClass('mobile-menu-overlay-active');
  })

  $('.mobile-menu-overlay').on('click', function () {
    $('.main-header').toggleClass('menu-mobile-active');
    $('body').toggleClass('active-body');
    $('.mobile-menu-overlay').toggleClass('mobile-menu-overlay-active');
  })

  $('.main-header .btn-close-header-mobile').on('click', function () {
    $('.main-header').toggleClass('menu-mobile-active');
    $('body').toggleClass('active-body');
    $('.mobile-menu-overlay').toggleClass('mobile-menu-overlay-active');
  })

  //    menu mobile


  $(window).on("load", function () {
      $("body").css("overflow-y", "auto"),
          $(".loader-page").fadeOut(500),
          new WOW().init();
  })


  $('.card-faq .card-header .btn-link').click(function(){
    $(this).closest('.card-faq').siblings().removeClass('active')
    $(this).closest('.card-faq').toggleClass('active')
  })


$('.ModalVideo').on('hidden.bs.modal', function (e) {
  jQuery(".ModalVideo iframe").attr("src", jQuery("#ModalVideo iframe").attr("src"));
})
//


$(window).scroll(function () {
  $('.layout').each(function () {
    if ($(window).scrollTop() > $(this).offset().top - 70) {
      var blockID = $(this).attr('id');
      $('.main-header a').removeClass('active')
      $('.main-header a[data-scroll="' + blockID + '"]').addClass('active')
    }
  })
});

$('.main-header a[data-scroll] ').click(function (e) {
  e.preventDefault();




    $('html, body').animate({
      scrollTop: $('#' + $(this).data('scroll')).offset().top -40
    }, 1100);

  if ($(window).width() < 992) {
    $('.main-header').toggleClass('menu-mobile-active');
    $('body').toggleClass('active-body');
    $('.mobile-menu-overlay').toggleClass('mobile-menu-overlay-active');
  }
});

$(window).scroll(function () {
  var $item = $('.main-header'),
    $itemTop = $item.position().top;
  if ($(window).scrollTop() > $itemTop) {
    $('.main-header').addClass('fixed');
  }
  else {
    $('.main-header').removeClass('fixed');
  }
});

$('.menu-link-footer a[data-scroll] ').click(function (e) {
    $('html, body').animate({
        scrollTop: $('#' + $(this).data('scroll')).offset().top -40
    }, 1100);
});

}(jQuery));


wow = new WOW(
  {
    boxClass: 'wow',      // default
    mobile: true,       // default
    live: true,       // default
  }
)
wow.init();
