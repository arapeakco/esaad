<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo mb-2"><img src="{{ asset('logo.png') }}" alt=""/></div>
                <h6 class="desc-website mb-4">{{ getSetting('address') }}</h6>
                <ul class="social-media mt-3">
                    <li><a class="instagram" href="{{ getSetting('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a class="twitter" href="{{ getSetting('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a class="facebook" href="{{ getSetting('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h3 class="title-footer">القائمة</h3>
                <ul class="link-footer menu-link-footer">
                    @if(getMenuItems())
                        @foreach(getMenuItems() as $index => $item)
                            <li class="menu_item"><a class="menu_link {{ $index == 0 ? 'active' : '' }}" data-scroll="{{ 'section' .($index+1) }}"><span class="menu_link-text">{{ $item->name }}</span></a></li>
                        @endforeach
                    @endif


                </ul>
            </div>
            <div class="col-lg-2">
                <h3 class="title-footer">القائمة</h3>
                <ul class="link-footer">
                    @if(getPostType())
                        @foreach(getPostType() as $index => $postType)
                            <li><a href="javascript:;">{{ $postType->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-lg-4">
                <h3 class="title-footer">تواصل معنا</h3>
                <p>ضع رجم جوالك، لنتمكن من إعادة الإتصا بك </p>
                <form action="" class="form-contact" id="contact">
                    <div class="form-group mb-4 pb-2">
                        <input type="text" class="form-control" name="phone" placeholder="رقم جوالك">
                        <span id="response_msg" class="d-none"></span>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="general_btn_lg ">اطلب تواصل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>
