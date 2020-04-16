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


    $(document).on('click', '.card-faq .card-header .btn-link', function () {
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
            scrollTop: $('#' + $(this).data('scroll')).offset().top - 40
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
        } else {
            $('.main-header').removeClass('fixed');
        }
    });

    $('.menu-link-footer a[data-scroll] ').click(function (e) {
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top - 40
        }, 1100);
    });


    $('.form-contact').validate({
        rules: {
            phone: {
                required: true,
                number: true
            },
        },
        messages: {
            phone: {
                required: 'يرجى ادخال رقم الهاتف',
                number: 'يرجى ادخال رقم هاتف صالح'
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
                margin: 10
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
        smartSpeed: 650,
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


    $(".scrollTop").on("click", function () {
        $("html,body").animate({scrollTop: 0}, 1000);
    });
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.scrollTop').fadeIn();
        } else {
            $('.scrollTop').fadeOut();
        }
    });

    $('.selectpicker').selectpicker();

    var priceArr = [];
    var membersArr = [];
    $(document).on('click', '.add_list_row', function (e) {

        var image = $('select[name=memberShip] option:selected').data('image');
        var name = $('select[name=memberShip] option:selected').data('name');
        var price = $('select[name=memberShip] option:selected').data('price');
        var id = $('select[name=memberShip] option:selected').data('id');


        if (membersArr.indexOf(id) < 0) {
            priceArr.push(price);
            membersArr.push(id);

            $('.widget__item-list').append(`
                <div class="widget__item-2" id="membership">
                    <div class="widget__item-action"><i class="fa fa-times-circle"></i></div>
                    <div class="widget__item-content">
                        <div class="widget__item-image">
                            <img src="${image}" alt="">
                        </div>
                        <div class="widget__item-info">
                            <h3 class="widget__item-title">${name}</h3>
                            <p class="widget__item-price">${price} ريال</p>
                        </div>
                    </div>
                    <div class="widget__item-total">${price} <span>ريال</span></div>
                </div>
                `);
            $('.selectpicker').selectpicker();
            $(".list-row").find('.add_list_row').not(":last").fadeOut()

            var total = priceArr.reduce((a, b) => a + b, 0);
            $('#ModalPayment').find('#total').text(total);
            $('#ModalPayment').find('form input[name=amount]').val(total);
            $('#ModalPayment').find('form input[name=membership_id]').val(membersArr);
        }


    })


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

    if ($(this).valid()) {
        $.ajax({
            url: '/contact',
            method: "post",
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                swal.fire(response.message, " ", "success");
                $('#contact')[0].reset();
            },
            error: function (response) {
                swal.fire(response.responseJSON.message, " ", "error");
            }
        })
    }

});

$('#ModalVideoMaster').on('show.bs.modal', function (e) {
    var url = $(e.relatedTarget).data('url');
    $(this).find('iframe').attr('src', url);
});


$('.form-payment').validate({
    rules: {
        'source[number]': {
            required: true,
            maxlength: 16,
            minlength: 16,
            number: true,
        },
        'source[name]': {
            required: true,
        },
        'source[month]': {
            required: true,
        },
        'source[year]': {
            required: true,
        },
        'source[cvc]': {
            required: true,
            maxlength: 3,
            minlength: 3,
            number: true,
        },
        'name': {
            required: true,
        },
        'phone': {
            required: true,
            number: true,
        },
    },
    messages: {
        'source[number]': {
            required: 'يرجى ادخال رقم البطاقة',
            number: 'رقم البطاقة يجب ان يتكون من ارقام فقط',
            maxlength: 'رقم البطاقة يجب ان يتكون من 16 رقم',
            minlength: 'رقم البطاقة يجب ان يتكون من 16 رقم'
        },
        'source[name]': {
            required: 'يرجى ادخال الإسم على البطاقة',
        },

        'source[cvc]': {
            required: 'يرجى ادخال الرقم السري',
            number: ' الرقم السري يجب ان يتكون من ارقام فقط',
            maxlength: ' الرقم السري يجب ان يتكون من 3 ارقام',
            minlength: ' الرقم السري يجب ان يتكون من 3 ارقام'
        },
        'name': {
            required: 'يرجى ادخال الإسم',
        },
        'phone': {
            required: 'يرجى ادخال رقم الجوال',
            number: 'رقم الجوال يجب ان يتكون من ارقام فقط',
        },
    }
});


$('.form-payment').submit(function (e) {

    e.preventDefault();

    var form = $(this);
    var fd = new FormData(this);

    if ($(this).valid()) {
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status) {
                    window.location = response.message;
                }
            },
            error: function (response) {
                swal.fire(response.responseJSON.message, " ", "error");
            }
        })
    }

});

//


var data = {
    labels: ["Red","Blue"],
    datasets: [
      {
        data: [200, 50],
        backgroundColor: ["#64CA31","#4E5261"],
      }]
  };



Chart.pluginService.register({
    beforeDraw: function(chart) {
      var width = chart.chart.width,
          height = chart.chart.height,
          ctx = chart.chart.ctx,
          type = chart.config.type;

      if (type == 'doughnut')
      {
        var color ='#fff';
          var percent = Math.round((chart.config.data.datasets[0].data[0] * 100) /
                      (chart.config.data.datasets[0].data[0] +
                      chart.config.data.datasets[0].data[1]));
        var fontSize = ((height - chart.chartArea.top) / 100).toFixed(2);
        ctx.textAlign = 'left';
        ctx.textBaseline = 'middle';

        ctx.restore();
        ctx.font = fontSize  + "rem sans-serif"
        ctx.textBaseline = "middle"
        ctx.textColor = "#FFF"


        var text = percent + "%",
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = (height + chart.chartArea.top) / 2;

        ctx.fillStyle = chart.config.data.datasets[0].backgroundColor[0];
        ctx.fillStyle = '#FFF';
        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  });


  var myChart = new Chart(document.getElementById('myChart'), {
    type: 'doughnut',
    data: data,
    options: {
      responsive: true,
      cutoutPercentage: 75,
        responsive: true,
      legend: {
        display: false
      },
      elements: {
        center: {
          color: "#fff",
          fontStyle: "Arial",
        },
        arc: {
            borderWidth: 0
        }
      }
    }
  });
