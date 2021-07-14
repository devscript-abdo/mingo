<div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>{{__('navbar.shopping_cart')}}</h1>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--shopping-cart ps-table--responsive">
                        <thead>
                            <tr>
                                <th>{{__('cart.product_name')}}</th>
                                <th>{{__('cart.product_price')}}</th>
                                <th>{{__('cart.product_qte')}}</th>
                                <th>{{__('cart.product_total')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItemes as $item)
                                
                                <tr>
                                    <td data-label="Product">
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail">
                                                <a href="{{$item->options->url}}">
                                                    <img src="{{$item->options->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="ps-product__content">
                                                <a href="{{$item->options->url}}">{{$item->name}}</a>
                                                {{--<p>{{__('cart.product_attr')}}</p>--}}
                                                @if($item->options->attributesData)      
                                                
                                                    @foreach ($item->options->attributesData as $key => $value)
                                                    
                                                    <p> {{$key}} : <strong> {{$value}}</strong></p>
                                                    
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="price" data-label="Price">{{$item->price}} {{__('symbole.mad')}}</td>
                                    <td data-label="Quantity">
                                        <div class="form-group--number">
                                            <button class="up" wire:click="increaseQte('{{$item->rowId}}')">+</button>
                                            <button class="down" wire:click="decreaseQte('{{$item->rowId}}')">-</button>
                                            <input 
                                              class="form-control"
                                              type="text"
                                              name="quantity"
                                              {{--wire:model.defer="quantity.{{$item->id}}"
                                               used when  buuton update cart enabled
                                              --}}
                                              id="quantity" 
                                        
                                              value="{{$item->qty}}"
                                            >
                                            @error('quantity') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </td>
                                    
                                    <td data-label="Total">{{$item->price * $item->qty}} {{__('symbole.mad')}}</td>
                                    <td data-label="Actions">
                                        <a href="#" data-prodid="{{$item->rowId}}" class="deleteProductFromCart">
                                            <i class="icon-cross"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="ps-section__cart-actions">
                    <a class="ps-btn" href="{{route('products')}}">
                        <i class="icon-arrow-left"></i> 
                        {{__('cart.back_to_store')}}
                    </a>
                    <button 
                      
                      class="ps-btn ps-btn--outline"
                     
                      onclick="return confirm('Vous voulez vraiment vider le panier ?');"

                      wire:click="removeCart()" 
                    >
                        <i class="icon-cross"></i> {{__('cart.remove')}}
                    </button>
                </div>
            </div>
            <div class="ps-section__footer">
                <div class="row">
                    
                       {{--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            @if(! session()->has('coupon'))
                            <figure>
                                <figcaption>Coupon Discount</figcaption>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{session()->get('message')}}
                                    </div>
                                @endif
                                
                                    <form method="post" action="{{route('coupon.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input 
                                                class="form-control @error('coupon_code') is-invalid @enderror" 
                                                type="text" 
                                                name="coupon_code"
                                                id="coupon_code" 
                                                placeholder=""
                                            >

                                            @error('coupon_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="ps-btn ps-btn--outline">Apply</button>
                                        </div>

                                    </form>
                            
                            </figure>
                            @endif
                        </div>--}}
                 
    
                    {{--@include('theme.shopping-cart.section_c_shipping')--}}
    
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                            {{--<div class="ps-block__header">
                                <p>Subtotal <span> {{$subTotal}} MAD</span></p>
                            </div>--}}
                            <div class="ps-block__content">
                                <ul class="ps-block__product">
                                    @if(session()->has('coupon'))
                                        <li>

                                            <span class="ps-block__shop">
                                                DISCOUNT({{session()->get('coupon')['name']}}) 
                                                - {{session()->get('coupon')['discount']/100}} MAD
                                                <a href="#" class="deleteCouponFromCart">
                                                    <i class="icon-cross"></i>
                                                </a>
                                            </span>
                                            <span class="ps-block__shipping">
                                             
                                            </span>
                           
                                        </li>
                                    @endif
                         
                                </ul>
                                <h3>{{__('cart.product_total')}} <span>{{$totalPrice}} {{__('symbole.mad')}}</span></h3>
                            </div>
                        </div>
                        <a class="ps-btn ps-btn--fullwidth" href="{{route('checkout')}}">{{__('buttons.checkout')}}</a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
