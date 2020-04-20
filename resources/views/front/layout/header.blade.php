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
                <ul class="main-menu list-main-menu d-lg-flex align-items-center">
                    @if(getMenuItems())
                        @foreach(getMenuItems() as $index => $item)
                            <li class="menu_item"><a @if ($index == (getMenuItems()->count()-1)) href="https://sys.esaad.org.sa/" @else data-scroll="{{ 'section' .($index+1) }}" @endif  class="menu_link {{ $index == 0 ? 'active' : '' }}" ><span class="menu_link-text">{{ $item->name }}</span></a></li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end:: Header -->
