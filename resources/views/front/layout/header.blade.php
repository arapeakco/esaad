<!-- begin:: Header Mobile -->
<div class="header-mobile">
    <div class="container">
        <div class="header-mobile-content">
            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" alt=""/></a></div>
            <div class="header-mobile__toolbar"><i class="fa fa-bars"></i></div>
        </div>
    </div>
</div>
<!-- end:: Header Mobile -->
<!-- begin:: Header -->
<header class="main-header">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center">
            <div class="logo d-none d-lg-block"><a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" alt=""/></a></div>
            <div class="menu-container d-lg-none ">
                <div class="btn-close-header-mobile justify-content-end"><i class="fas fa-times"></i></div>
            </div>
            <div class="menu-container mr-lg-auto">
                <ul class="main-menu list-main-menu">
                    @if(getMenuItems())
                        @foreach(getMenuItems() as $index => $item)
                            <li class="menu_item"><a class="menu_link {{ $index == 0 ? 'active' : '' }}" data-scroll="{{ 'section' .($index+1) }}"><span class="menu_link-text">{{ $item->name }}</span></a></li>
                        @endforeach
                    @endif
{{--                    <li class="menu_item"><a class="menu_link" data-scroll="section-about"><span class="menu_link-text">عن الحملة</span></a></li>--}}
{{--                    <li class="menu_item"><a class="menu_link" data-scroll="section-banks"><span class="menu_link-text">مصارف الحملة</span></a></li>--}}
{{--                    <li class="menu_item"><a class="menu_link" data-scroll="section-famous"><span class="menu_link-text">مشاهير الحملة</span></a></li>--}}
{{--                    <li class="menu_item"><a class="menu_link" data-scroll="section-recom"><span class="menu_link-text">التزكيات</span></a></li>--}}
{{--                    <li class="menu_item"><a class="menu_link" data-scroll="section-faq"><span class="menu_link-text">الأسئلة الشائعة</span></a></li>--}}
{{--                    <li class="menu_item"><a class="menu_link" data-scroll=""><span class="menu_link-text">تسجيل المستفيدات</span></a></li>--}}
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end:: Header -->
