<!DOCTYPE html>
<html>
<head>
    @include('front.layout.head')
</head>
<body>
<!-- begin:: Page -->
<div class="main-wrapper">
{{--    <div class="loader-page">--}}
{{--        <div class="lds-ellipsis">--}}
{{--            <div></div>--}}
{{--            <div></div>--}}
{{--            <div></div>--}}
{{--            <div></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="mobile-menu-overlay"></div>

    @include('front.layout.header')
    <!-- begin:: hero -->
    <div class="hero layout" id="section1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto">
                    <div class="hero-action wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"><a class="btn hero-action-btn" data-toggle="modal" data-target="#ModalPayment" >ادعم الآن</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: hero -->
    <!-- Start:: section-about -->
    <section class="section-about layout" id="section2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="section-title text-right wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">{{ $about->name }}</h3>
                    <div class="section-text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">

                        {{ $about->posts()->first()->short_description }}

                    </div>
                </div>
                <div class="col-lg-5 mr-auto">
                    <div class="imageSection overlay wow fadeInUp shape" data-wow-duration="1s" data-wow-delay="0.1s">
                        <img src="{{ url('image/' . @$about->posts()->first()->data['image'] . '/424x235') }}" alt="">
                        <div class="playVideo btn-hover " data-toggle="modal" data-url="{{ $about->name }}" data-target="#ModalVideoMaster">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: section-about -->

    <!-- Start:: section-about -->
    <section class="section-member layout" id="section3">
        <div class="container">
            <h3 class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">{{ $membership->name }}</h3>
            <div class="contnt shape">
                <div class="row">

                    @if ($membership->posts->count())
                        @foreach($membership->posts as $post)
                            <div class="col-lg-4">
                                <div class="widget__item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                    <div class="widget__item-image">
                                        <img src="{{ url('image/' . @$post->data['image'] . '/333x366') }}" alt="{{ $post->name }}">
                                    </div>
                                    <div class="widget__item-body">
                                        <div class="widget__item-title">{{ $post->name }}</div>
                                        <a href="" data-toggle="modal" data-target="#ModalPayment" class="widget__item-action">ادعم الآن</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif



                </div>
            </div>
        </div>
    </section>
    <!-- end:: section-about -->
    <section class="section-banks layout" id="section4">
        <div class="container">
            <h3 class="section-title text-white wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">{{ @$expenses->name }}</h3>
            <div class="row">


                @if (@$expenses->posts->count())
                    @foreach($expenses->posts as $expensesPost)

                        <div class="col-lg-3 col-md-6">
                            <div class="flip-card wow fadeInUp animate" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="cell">
                                            <div class="widget__item_image">
                                                <picture><img src="{{ url('image/' . @$expensesPost->data['image'] . '/333x366') }}" alt="{{ $expensesPost->name }}"/></picture>
                                            </div>
                                            <h4 class="widget__item_title">{{ $expensesPost->name }} </h4>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="cell">
                                            <h4 class="widget__item_text">
                                                {{ $expensesPost->short_description }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif



            </div>
        </div>
    </section>
    <!-- End Section Bank -->
    <!-- Start Section famous-->
    <section class="section-famous layout" id="section5">
        <div class="container">
            <h3 class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">{{ @$famous->name }} </h3>
            @if (@$famous->posts->count())
            <div class="slider-famous   owl-carousel owl-theme">
                @foreach($famous->posts as $singlePost)
                <div class="entry-box wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.1s">
                    <div class="entry-box-image overlay" data-toggle="modal" data-target="#ModalVideo" >
                        <picture>
                            <img src="{{ url('image/' . @$singlePost->data['image'] . '/333x366') }}" alt="{{ $singlePost->name }}">
                        </picture>
                        <div class="playVideo">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="entry-box-body">
                        <h3 class="entry-box-title">{{ $singlePost->name }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!-- End Section famous-->

    <!-- Start Section famous-->
    <section class="section-recom layout" id="section6">
        <div class="container">
            <h3 class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">{{ @$recommendations->name }} </h3>
            <div class="content">
                @if (@$recommendations->posts()->count())
                <div class="slider-recom owl-carousel owl-theme">
                    @foreach($recommendations->posts as $rec )
                        <div class="entry-box-2  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="entry-box-text">
                                {{ @$rec->short_description }}

                            </div>
                            <div class="entry-box-profile">
                                <div class="entry-box-image">
                                    <img src="{{ url('image/' . @$rec->data['image'] . '/60x60' ) }}" alt="{{ $rec->name }}">
                                </div>
                                <div class="entry-box-info">
                                    <h4 class="entry-box-name">{{ $rec->name }}</h4>
                                    <p class="entry-box-company">{{ @$rec->data['specialization'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Section famous-->

    <!-- Start Section faq -->
    <section class="section-faq layout" id="section7">
        <div class="container">
            <h3 class="section-title mb-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">الأسئلة الشائعة</h3>
            <div class="row">
                <div class="col-lg-10">
                    <div class="wow fadeInUp accordion shape" id="accordion" data-wow-duration="1s" data-wow-delay="0.2s">


                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="text-faq  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        ؟
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <a href="javascript:;" id="more" data-url=" " class="btn btn-more wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">المزيد</a>
            </div>
        </div>
    </section>
    <!-- end:: hero -->
    <!-- begin:: main-footer -->
        @include('front.layout.footer')
    <!-- end:: main-footer -->
    <!-- begin:: copy-right -->
    <div class="copyRight">
        <div class="container">
            <p>جمعية الحقوق محفوظة </p>
        </div>
    </div>
</div>
<div class="scrollTop"><i class="far fa-chevron-up"></i></div>
<!-- Modal -->
<div class="modal fade ModalVideo" id="ModalVideo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY"  class="videoModal"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade ModalVideo" id="ModalVideoMaster" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <iframe src="https://www.youtube.com/embed/dXpyoSe7yWo"  class="videoModal"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalPayment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="modal-title">اختر طريقة الدفع</h3>
                <div class="widget__item-list">
                    <div class="widget__item-2">
                        <div class="widget__item-action"><i class="fa fa-times-circle"></i></div>
                        <div class="widget__item-content">
                            <div class="widget__item-image">
                                <img src="images/img-4.png" alt="">
                            </div>
                            <div class="widget__item-info">
                                <h3 class="widget__item-title">عضوية التميز</h3>
                                <p class="widget__item-price">220 ريال</p>
                            </div>
                        </div>
                        <div class="widget__item-total">234 <span>ريال</span></div>
                    </div>
                    <div class="widget__item-2">
                        <div class="widget__item-action"><i class="fa fa-times-circle"></i></div>
                        <div class="widget__item-content">
                            <div class="widget__item-image">
                                <img src="images/img-4.png" alt="">
                            </div>
                            <div class="widget__item-info">
                                <h3 class="widget__item-title">عضوية التميز</h3>
                                <p class="widget__item-price">220 ريال</p>
                            </div>
                        </div>
                        <div class="widget__item-total">234 <span>ريال</span></div>
                    </div>
                </div>
                <h3 class="modal-title">اختر طريقة الدفع</h3>
                <div class="list-payment-method">
                    <label class="m-radio mb-0">
                        <input type="radio" checked name="checkbox"><span class="checkmark"></span><img src="images/visa.png" alt="">
                    </label>
                    <label class="m-radio mb-0">
                        <input type="radio" name="checkbox"><span class="checkmark"></span><img src="images/mastercard.png" alt="">
                    </label>
                    <label class="m-radio mb-0">
                        <input type="radio" name="checkbox"><span class="checkmark"></span><img src="images/mada.png" alt="">
                    </label>
                </div>
                <form action="" class="form-payment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="رقم البطاقة">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الإسم على البطاقة ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="تاريخ الإنتهاء">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الرقم السري">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الإسم الكريم">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="رقم الجوال">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="total"><h3 class="pl-2">الإجمالي</h3>431<span>ريال </span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="form-group mb-0">
                                <button type="submit" class="general_btn_lg">ادفع الان</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
@include('front.layout.scripts')
</body>
</html>
