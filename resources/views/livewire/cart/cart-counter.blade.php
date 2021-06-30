<div>
    <div class="ps-cart--mini">
        <a class="header__extra" href="{{route('shoppingcart')}}">
            <i class="icon-bag2"></i><span><i>{{$cartItemes->count()}}</i></span>
        </a>
        <div class="ps-cart__content">
            <div class="ps-cart__items">
                @foreach($cartItemes as $item)
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail">
                            <a href="{{$item->options->url}}">
                                <img src="{{$item->options->image}}" alt="{{$item->name}}">
                            </a>
                        </div>
                        <div class="ps-product__content">
                            <a class="ps-product__remove deleteProductFromCart" href="#" data-prodid="{{$item->rowId}}">
                        
                                <i class="icon-cross"></i>
                            </a>
                            <a href="{{$item->options->url}}">{{$item->name}}</a>
                            {{--<p><strong>Sold by:</strong> YOUNG SHOP</p>--}}
                            <br>
                            <small>{{$item->qty}} x {{$item->price}} {{__('symbole.mad')}}</small>
                        </div>
                    </div>
                @endforeach
            
            </div>
            <div class="ps-cart__footer">
                <h3>{{__('cart.product_total')}}<strong>{{$totalPrice}} {{__('symbole.mad')}} </strong></h3>
                <figure>
                    <a class="ps-btn" href="{{route('shoppingcart')}}">
                        {{__('cart.show_cart')}}
                     </a>
                    <a class="ps-btn" href="{{route('checkout')}}">{{__('cart.checkout')}}</a>
                </figure>
            </div>
        </div>
    </div>
</div>
