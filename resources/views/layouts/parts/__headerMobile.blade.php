<header class="header header--mobile" data-sticky="true" >
    <div class="header__top">
        <div class="header__left">
            <p>Welcome to mingo Online Shopping Store !</p>
        </div>
        <div class="header__right">
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
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="{{route('home')}}">
              <img src="{{Voyager::image(setting('site.logo'))}}" alt="Mingo.ma logo">
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">

                @livewire('cart.cart-counter')

                <div class="ps-block--user-header">
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
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
</header>