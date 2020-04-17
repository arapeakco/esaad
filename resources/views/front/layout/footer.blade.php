<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo mb-2"><img src="{{ asset('logo.png') }}" alt=""/></div>
                <h6 class="desc-website mb-4">{{ getSetting('address') }}</h6>
                <ul class="social-media mt-3">
                    @if( getSetting('instagram') )
                        <li><a class="instagram" href="{{ getSetting('instagram') }}" target="_blank"><i
                                    class="fab fa-instagram"></i></a></li>

                    @endif
                    @if( getSetting('twitter') )
                        <li><a class="twitter" href="{{ getSetting('twitter') }}" target="_blank"><i
                                    class="fab fa-twitter"></i></a></li>

                    @endif
                    @if( getSetting('facebook') )
                        <li><a class="facebook" href="{{ getSetting('facebook') }}" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a></li>

                    @endif
                    @if( getSetting('youtube') )
                        <li><a class="youtube" href="{{ getSetting('youtube') }}" target="_blank"><i
                                    class="fab fa-youtube"></i></a></li>
                    @endif
                    @if( getSetting('snapchat') )
                        <li><a class="snapchat" href="{{ getSetting('snapchat') }}" target="_blank"><i
                                    class="fab fa-snapchat"></i></a></li>
                    @endif
                    @if( getSetting('email') )
                        <li><a class="email" href="{{ getSetting('email') }}" target="_blank"><i
                                    class="fa  fa-mail-bulk"></i></a></li>
                    @endif
                    @if( getSetting('phone') )
                        <li><a class="phone" href="{{ getSetting('phone') }}" target="_blank"><i
                                    class="fa fa-phone"></i></a></li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-2">
                <h3 class="title-footer">القائمة</h3>
                <ul class="link-footer">
                    <li><a href="">الرئيسية</a></li>
                    <li><a href="">عن الحملة</a></li>
                    <li><a href="">مصارف الحملة</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h3 class="title-footer">القائمة</h3>
                <ul class="link-footer">
                    <li><a href="">مشاهير الحملة</a></li>
                    <li><a href="">التزكيات</a></li>
                    <li><a href="">الأسئلة الشائعة</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h3 class="title-footer">تواصل معنا</h3>
                <p>ضع رجم جوالك، لنتمكن من إعادة الإتصا بك </p>
                <form action="" class="form-contact" id="contact">
                    <div class="form-group mb-4 pb-2">
                        <input type="text" class="form-control" name="phone" placeholder="رقم جوالك">
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="general_btn_lg ">اطلب تواصل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
