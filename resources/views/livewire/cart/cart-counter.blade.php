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
                            <a class="ps-product__remove" href="#"><i class="icon-cross"></i></a>
                            <a href="{{$item->options->url}}">{{$item->name}}</a>
                            {{--<p><strong>Sold by:</strong> YOUNG SHOP</p>--}}
                            <br>
                            <small>{{$item->qty}} x {{$item->price}} MAD</small>
                        </div>
                    </div>
                @endforeach
            
            </div>
            <div class="ps-cart__footer">
                <h3>Sub Total:<strong>$59.99</strong></h3>
                <figure>
                    <a class="ps-btn" href="{{route('shoppingcart')}}">View Cart</a>
                    <a class="ps-btn" href="checkout.html">Checkout</a>
                </figure>
            </div>
        </div>
    </div>
</div>
