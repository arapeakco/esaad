
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





$('.form-contact').validate({
    rules: {
      phone: {
        required: true,
        number:true
      },
    },
    messages: {
        phone: {
        required: 'يرجى ادخال رقم الهاتف',
        number:'يرجى ادخال رقم هاتف صالح'
      },
    }
  });


  var sliderFamous = $('.slider-famous');
    sliderFamous.owlCarousel({
    margin: 30,
    smartSpeed: 650,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    slideTransition: 'linear',
    nav: false,
    dots: true,
    rtl: true,
    mouseDrag: true,
    responsive: {
        0: {
        items: 2,
        margin:10
        },
        600: {
        items: 2,

        },
        1000: {
        items: 3,
        }
    }
});



var slideRecom = $('.slider-recom');
slideRecom.owlCarousel({
  margin: 30,
  smartSpeed:650,
  loop: false,
  autoplay: false,
  autoplayTimeout: 5000,
  slideTransition: 'linear',
  nav: false,
  dots: true,
  rtl: true,
  mouseDrag: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,

    },
    1000: {
      items: 3,
    }
  }
});



$(".scrollTop").on("click", function() {
    $("html,body").animate({ scrollTop: 0 }, 1000);
  });
  $(window).on( 'scroll', function () {
      if ($(this).scrollTop() > 600) {
          $('.scrollTop').fadeIn();
      } else {
          $('.scrollTop').fadeOut();
      }
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


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.addEventListener('load', (event) => {
    $.ajax({
        url: "/faqs",
        method: "get",
        success: function (response) {
            $('#accordion').append(response.data.html);
            if (!response.data.next) {
                $('#more').addClass('d-none');
            } else {
                $('#more').data('url', response.data.next);
            }
        }
    })
});

$(document).on('click', 'a#more', function () {
    $.ajax({
        url: $(this).data('url'),
        method: "get",
        success: function (response) {
            $('#accordion').append(response.data.html);
            if (!response.data.next) {
                $('#more').addClass('d-none');
            } else {
                $('#more').data('url', response.data.next);
            }
        }
    })
});

$('#contact').submit(function (e) {

    e.preventDefault();

    var fd = new FormData(this);

    if($(this).valid()){
        $.ajax({
            url: '/contact',
            method: "post",
            data : fd,
            contentType:false,
            processData: false,
            success: function (response) {
                $('#response_msg').text(response.message).addClass('text-success').removeClass('text-danger d-none');
            },
            error : function (response) {
                $('#response_msg').text(response.responseJSON.message).removeClass('text-sucess d-none').addClass('text-danger');
            }
        })
    }

});

$('#ModalVideoMaster').on('show.bs.modal', function(e) {
     var url = $(e.relatedTarget).data('url');
     $(this).find('iframe').attr('src' , url);
});
