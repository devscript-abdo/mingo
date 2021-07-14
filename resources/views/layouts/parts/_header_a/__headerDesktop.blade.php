<header class="header header--standard header--market-place-2" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <p>Welcome to MINGO Online Shopping Store !</p>
            </div>
            <div class="header__right">
                <ul class="header__top-links">
                    <li><a href="#">Store Location</a></li>
                    {{--<li><a href="#">Track Your Order</a></li>--}}
                     {{--<li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>--}}
                    <li>
                        <div class="ps-dropdown language">
                            <a href="#">
                                @php
                                $default = Mingo::currentLocale()
                                @endphp
                                <img src="{{asset("assets/img/flag/{$default}.png")}}" alt="{{Mingo::currentLocaleName()}}" width="18" height="12">
                                {{Mingo::currentLocaleName()}}
                            </a>
                            <ul class="ps-dropdown-menu">
                
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li> 
                                        <a 
                                            rel="alternate" 
                                            hreflang="{{ $localeCode }}" 
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            class="dropdown-item" 
                                        >
                                        <img src="{{asset("assets/img/flag/{$localeCode}.png")}}" alt="{{ $localeCode }}"
                                        width="18" height="12"
                                        >
                                        {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__content">
        <div class="container">
            <div class="header__content-left">
                <a class="ps-logo" href="{{route('home')}}">
                    <img src="{{Voyager::image(setting('site.logo'))}}" alt="">
                </a>
                @include('layouts.parts._header_a._header_categories')
            </div>
            <div class="header__content-center">
                @include('layouts.parts._header_a._header_search_form')
                {{--<p>
                    <a href="#">iphone x</a>
                    <a href="#">virtual</a>
                    <a href="#">apple</a>
                </p>--}}
            </div>
            <div class="header__content-right">
                <div class="header__actions">
                    <a class="header__extra" href="#"><i class="icon-heart"></i><span><i>0</i></span></a>
                    {{--@include('layouts.parts._header_a._header_cart')--}}
                    @livewire('cart.cart-counter')
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right">
                            <a href="{{route('customer.login')}}">{{__('navbar.login_link')}}</a>
                            <a href="{{route('customer.register')}}">{{__('navbar.register_link')}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.parts._header_a._header_navbar')
</header>