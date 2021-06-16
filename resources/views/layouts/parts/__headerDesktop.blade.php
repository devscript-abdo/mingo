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
                <form class="ps-form--quick-search" action="" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control">
                            <option value="0" selected="selected">All</option>
                            <option class="level-0" value="babies-moms">Babies & Moms</option>
                            <option class="level-0" value="books-office">Books & Office</option>
                            <option class="level-0" value="cars-motocycles">Cars & Motocycles</option>
                            <option class="level-0" value="clothing-apparel">Clothing & Apparel</option>
                            <option class="level-1" value="accessories-clothing-apparel">Accessories</option>
                            <option class="level-1" value="bags">Bags</option>
                            <option class="level-1" value="kids-fashion">Kid’s Fashion</option>
                            <option class="level-1" value="mens">Mens</option>
                            <option class="level-1" value="shoes">Shoes</option>
                            <option class="level-1" value="sunglasses">Sunglasses</option>
                            <option class="level-1" value="womens">Womens</option>
                            <option class="level-0" value="computers-technologies">Computers & Technologies</option>
                            <option class="level-1" value="desktop-pc">Desktop PC</option>
                            <option class="level-1" value="laptop">Laptop</option>
                            <option class="level-1" value="smartphones">Smartphones</option>
                            <option class="level-0" value="consumer-electrics">Consumer Electrics</option>
                            <option class="level-1" value="air-conditioners">Air Conditioners</option>
                            <option class="level-2" value="accessories">Accessories</option>
                            <option class="level-2" value="type-hanging-cell">Type Hanging Cell</option>
                            <option class="level-2" value="type-hanging-wall">Type Hanging Wall</option>
                            <option class="level-1" value="audios-theaters">Audios & Theaters</option>
                            <option class="level-2" value="headphone">Headphone</option>
                            <option class="level-2" value="home-theater-system">Home Theater System</option>
                            <option class="level-2" value="speakers">Speakers</option>
                            <option class="level-1" value="car-electronics">Car Electronics</option>
                            <option class="level-2" value="audio-video">Audio & Video</option>
                            <option class="level-2" value="car-security">Car Security</option>
                            <option class="level-2" value="radar-detector">Radar Detector</option>
                            <option class="level-2" value="vehicle-gps">Vehicle GPS</option>
                            <option class="level-1" value="office-electronics">Office Electronics</option>
                            <option class="level-2" value="printers">Printers</option>
                            <option class="level-2" value="projectors">Projectors</option>
                            <option class="level-2" value="scanners">Scanners</option>
                            <option class="level-2" value="store-business">Store & Business</option>
                            <option class="level-1" value="refrigerators">Refrigerators</option>
                            <option class="level-1" value="tv-televisions">TV Televisions</option>
                            <option class="level-2" value="4k-ultra-hd-tvs">4K Ultra HD TVs</option>
                            <option class="level-2" value="led-tvs">LED TVs</option>
                            <option class="level-2" value="oled-tvs">OLED TVs</option>
                            <option class="level-1" value="washing-machines">Washing Machines</option>
                            <option class="level-2" value="type-drying-clothes">Type Drying Clothes</option>
                            <option class="level-2" value="type-horizontal">Type Horizontal</option>
                            <option class="level-2" value="type-vertical">Type Vertical</option>
                            <option class="level-0" value="garden-kitchen">Garden & Kitchen</option>
                            <option class="level-1" value="cookware">Cookware</option>
                            <option class="level-1" value="decoration">Decoration</option>
                            <option class="level-1" value="furniture">Furniture</option>
                            <option class="level-1" value="garden-tools">Garden Tools</option>
                            <option class="level-1" value="home-improvement">Home Improvement</option>
                            <option class="level-1" value="powers-and-hand-tools">Powers And Hand Tools</option>
                            <option class="level-1" value="utensil-gadget">Utensil & Gadget</option>
                            <option class="level-0" value="health-beauty">Health & Beauty</option>
                            <option class="level-1" value="equipments">Equipments</option>
                            <option class="level-1" value="hair-care">Hair Care</option>
                            <option class="level-1" value="perfumer">Perfumer</option>
                            <option class="level-1" value="skin-care">Skin Care</option>
                            <option class="level-0" value="jewelry-watches">Jewelry & Watches</option>
                            <option class="level-1" value="gemstone-jewelry">Gemstone Jewelry</option>
                            <option class="level-1" value="mens-watches">Men’s Watches</option>
                            <option class="level-1" value="womens-watches">Women’s Watches</option>
                            <option class="level-0" value="phones-accessories">Phones & Accessories</option>
                            <option class="level-1" value="iphone-8">Iphone 8</option>
                            <option class="level-1" value="iphone-x">Iphone X</option>
                            <option class="level-1" value="sam-sung-note-8">Sam Sung Note 8</option>
                            <option class="level-1" value="sam-sung-s8">Sam Sung S8</option>
                            <option class="level-0" value="sport-outdoor">Sport & Outdoor</option>
                            <option class="level-1" value="freezer-burn">Freezer Burn</option>
                            <option class="level-1" value="fridge-cooler">Fridge Cooler</option>
                            <option class="level-1" value="wine-cabinets">Wine Cabinets</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" placeholder="I'm shopping for..." id="input-search">
                    <button>Search</button>
                    <div class="ps-panel--search-result">
                        <div class="ps-panel__content">
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/1.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 32GB</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span></span>
                                    </div>
                                    <p class="ps-product__price">$990.50</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/1.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span></span>
                                    </div>
                                    <p class="ps-product__price">$1120.50</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/1.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 128GB</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span></span>
                                    </div>
                                    <p class="ps-product__price">$1220.50</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/2.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$36.78 – $56.99</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/3.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price">$125.30</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/4.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price">$55.30</p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/5.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price sale">$41.27 <del>$52.99 </del></p>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide ps-product--search-result">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/6.jpg')}}" alt=""></a></div>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$41.27 <del>$62.39 </del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-panel__footer text-center"><a href="shop-default.html">See all results</a></div>
                    </div>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions"><a class="header__extra" href="#"><i class="icon-chart-bars"></i><span><i>104</i></span></a><a class="header__extra" href="#"><i class="icon-heart"></i><span><i>0</i></span></a>
                    {{--@include('layouts.parts.__cartHeaderDesktop')--}}
                    @livewire('cart.cart-counter')
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right">
                            <a href="{{route('customer.login')}}">Login</a>
                            <a href="{{route('customer.register')}}">Register</a>
                        </div>
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
                    <li><a href="{{route('home')}}">Home</a>
                
                    </li>
                    <li><a href="{{route('products')}}">Shop</a>
                
                    </li>
                    <li><a href="index.html">About</a>
                
                    </li>
                    <li><a href="index.html">Contact</a>
                
                    </li>
                </ul>
                <ul class="navigation__extra">
                    <li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="ps-dropdown language"><a href="#"><img src="{{asset('assets/img/flag/en.png')}}" alt="">English</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#"><img src="{{asset('assets/img/flag/germany.png')}}" alt=""> Germany</a></li>
                                <li><a href="#"><img src="{{asset('assets/img/flag/fr.png')}}" alt=""> France</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>