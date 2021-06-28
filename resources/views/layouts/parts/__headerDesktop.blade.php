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
                   @include('layouts.parts.__searchForm')
            </div>
            <div class="header__right">
                <div class="header__actions">
                    <a class="header__extra" href="#">
                        <i class="icon-chart-bars"></i>
                        <span><i>104</i></span>
                    </a>
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
                    
                    {{--@include('layouts.parts.__cartHeaderDesktop')--}}

                    @livewire('cart.cart-counter')

                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>

                        @guest('customer')
                            <div class="ps-block__right">
                            
                                    <a href="{{route('customer.login')}}">Login</a>
                                    <a href="{{route('customer.register')}}">Register</a>
                            </div>
                        @endguest

                        @auth('customer')
                            <div class="ps-block__right">
                                <a href="{{route('customer.profil')}}">My Account</a>
                            </div>

                            
                            <div class="ps-block__right">
                                <div class="ps-block__left">
                                    <a href="#"  onclick="document.getElementById('logoutMingoo').submit();">
                                        <i class="icon-power-switch"></i>
                                    </a>
                                </div>
                                <form 
                                    action="{{route('customer.logout')}}" 
                                    method="post" 
                                    hidden 
                                    id="logoutMingoo"
                                
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
                        <a href="{{route('home')}}">Home</a>
                
                    </li>
                    <li>
                        <a href="{{route('products')}}">Shop</a>
                
                    </li>
                    <li>
                        <a href="{{route('about')}}">About</a>
                
                    </li>
                    <li>
                        <a href="{{route('contact')}}">Contact</a>
                
                    </li>
                </ul>
                <ul class="navigation__extra">
                    <li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">MAD MAROC</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">MAD MAROC</a></li>
                                
                            </ul>
                        </div>
                    </li>
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