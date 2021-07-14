<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
               {{--@include('layouts.parts.__listCategories')--}}
                @include('layouts.parts.__masterListCategories')
                <a class="ps-logo" href="{{route('home')}}"><img src="{{Voyager::image(setting('site.logo'))}}" alt=""
                    
                    style="width: 180px; !important"></a>
            </div>
            <div class="header__center">
                   {{--@include('layouts.parts.__searchForm')--}}
                   @livewire('search.search')
            </div>
            <div class="header__right">
                <div class="header__actions">
                    {{--<a class="header__extra" href="#">
                        <i class="icon-chart-bars"></i>
                        <span><i>104</i></span>
                    </a>--}}
                    @auth('customer')
                        <a class="header__extra" href="{{route('customer.wishlist')}}">
                            <i class="icon-heart"></i>
                            <span>
                                <i>
                                    {{auth()->guard('customer')->user()->wishlist()->count()}}
                                </i>
                            </span>
                        </a>
                    @endauth
                    @guest('customer')
                        <a 
                            href="#"
                            class="header__extra" 
                            data-placement="top"
                            data-toggle="modal"
                            data-target="#product-wishlistGuest"
                            title="{{__('buttons.add_to_wish')}}"
                        >
                            <i class="icon-heart"></i>
                            <span>
                                <i>
                                   0
                                </i>
                            </span>
                        </a>
                   @endguest
                    
                    {{--@include('layouts.parts.__cartHeaderDesktop')--}}

                    @livewire('cart.cart-counter')

                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>

                        @guest('customer')
                            <div class="ps-block__right">
                            
                                    <a href="{{route('customer.login')}}">{{__('navbar.login_link')}}</a>
                                    <a href="{{route('customer.register')}}">{{__('navbar.register_link')}}</a>
                            </div>
                        @endguest

                        @auth('customer')
                            <div class="ps-block__right">
                                <a href="{{route('customer.profil')}}">
                                {{__('navbar.my_account')}}
                                </a>
                            </div>

                            
                            <div class="ps-block__right">
                                <div class="ps-block__left">
                                    <a href="#"  onclick="document.getElementById('logoutMing').submit();">
                                        <i class="icon-power-switch"></i>
                                    </a>
                                </div>
                                <form 
                                    action="{{route('customer.logout')}}" 
                                    method="post" 
                                    hidden 
                                    id="logoutMing"
                                
                                >
                                    @csrf
                                </form>
                            </div>
                        
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="ps-container">
            <div class="navigation__left">
                @include('layouts.parts.__masterListCategories')
            </div>
            <div class="navigation__right">
                <ul class="menu">
                    <li>
                        <a href="{{route('home')}}">{{__('navbar.home')}}</a>
                
                    </li>
                    <li>
                        <a href="{{route('products')}}">{{__('navbar.shop')}}</a>
                
                    </li>

                    @if($categoriesMenu)

                        @foreach ( $categoriesMenu as $category)
                            <li>
                                <a href="{{$category->url}}">{{$category->field('name')}}</a>
                            </li>
                        @endforeach

                    @endif

                    {{--<li>
                        <a href="{{route('about')}}">{{__('navbar.about')}}</a>
                
                    </li>
                    <li>
                        <a href="{{route('contact')}}">{{__('navbar.contact')}}</a>
                
                    </li>--}}
                </ul>
                <ul class="navigation__extra">
                    {{--<li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">{{__('navbar.track_order')}}</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">{{__('navbar.mad_maroc')}}</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">{{__('navbar.mad_maroc')}}</a></li>
                                
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
                                {{--<li><a href="#"><img src="{{asset('assets/img/flag/germany.png')}}" alt=""> Germany</a></li>
                                <li><a href="#"><img src="{{asset('assets/img/flag/fr.png')}}" alt=""> France</a></li>--}}
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
    </nav>
</header>