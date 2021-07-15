<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{__('homePage.more_searched')}}</h3>
                </div>
                {{--<div class="ps-block__right">
                    <figure>
                        <figcaption>End in:</figcaption>
                        <ul class="ps-countdown" data-time="December 30, 2021 15:37:25">
                            <li><span class="days"></span></li>
                            <li><span class="hours"></span></li>
                            <li><span class="minutes"></span></li>
                            <li><span class="seconds"></span></li>
                        </ul>
                    </figure>
                </div>--}}
            </div><a href="#">{{__('buttons.show_all')}}</a>
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach ($productsSearched as $prod)
                
                    <div class="ps-product ps-product--inner">
                        <div class="ps-product__thumbnail">
                            <a href="{{$prod->url}}">
                              <img src="{{$prod->photo}}" alt="{{$prod->field('name')}}">
                            </a>
                            {{--<div class="ps-product__badge out-stock">Out Of Stock</div>--}}
                            <ul class="ps-product__actions">
                                
                                @livewire('cart.add-to-cart',['prod'=>$prod->id])
                                
                                <li>
                                    <a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a>
                                </li>
                                @auth('customer')
                                    <li>
                                        <a
                                        wire:click="addToWishList({{$prod->id}})"
                                        href="#" 
                                        data-toggle="tooltip" 
                                        data-placement="top" 
                                        title="{{__('buttons.add_to_wish')}}"
                                        onclick="return false;"
                                        >
                                            <i class="icon-heart"></i>
                                        </a>
                                    </li>
                                @endauth
                                @guest('customer')
                            
                                    <li>
                                        <a 
                                            href="#"
                                            data-placement="top"
                                            data-toggle="modal"
                                            data-target="#product-wishlistGuest"
                                            title="{{__('buttons.add_to_wish')}}"
                                            onclick="return false;"
                                        >
                                            <i class="icon-heart"></i>
                                        </a>
                                    </li>

                                @endguest
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <p class="ps-product__price">{{$prod->price}} {{__('symbole.mad')}}<small></small></p>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{$prod->url}}">{{$prod->field('name')}}</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>