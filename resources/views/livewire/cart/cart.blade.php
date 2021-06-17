<div>
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>Shopping Cart</h1>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--shopping-cart ps-table--responsive">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
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
                                            <div class="ps-product__content"><a href="{{$item->options->url}}">{{$item->name}}</a>
                                                {{--<p>Sold By:<strong> YOUNG SHOP</strong></p>--}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-label="Price">{{$item->price}} MAD</td>
                                    <td data-label="Quantity">
                                        <div class="form-group--number">
                                            <button class="up">+</button>
                                            <button class="down">-</button>
                                            <input 
                                              class="form-control"
                                              type="number"
                                              name="quantity"
                                              wire:model.defer="quantity.{{$item->id}}"
                                              id="quantity" 
                                              min="1" 
                                             
                                              value="{{$item->qty}}"
                                             
                                            >
                                        </div>
                                    </td>
                                    
                                    <td data-label="Total">{{$item->price * $item->qty}} MAD</td>
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
                    <a class="ps-btn" href="{{route('products')}}"><i class="icon-arrow-left"></i> Back to Shop</a>
                    <button 
                      wire:click="updateCart()" 
                      class="ps-btn ps-btn--outline"
                      onclick="this.disabled = true;this.setAttribute('style', 'background: #000000')"
                    >
                        <i class="icon-sync"></i> Update cart
                    </button>
                </div>
            </div>
            <div class="ps-section__footer">
                <div class="row">
    
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <figure>
                            <figcaption>Coupon Discount</figcaption>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="">
                            </div>
                            <div class="form-group">
                                <button class="ps-btn ps-btn--outline">Apply</button>
                            </div>
                        </figure>
                    </div>
    
                    {{--@include('theme.shopping-cart.section_c_shipping')--}}
    
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                            <div class="ps-block__header">
                                <p>Subtotal <span> $683.49</span></p>
                            </div>
                            <div class="ps-block__content">
                                <ul class="ps-block__product">
                                    <li>
                                        <span class="ps-block__shop">YOUNG SHOP Shipping</span>
                                        <span class="ps-block__shipping">Free Shipping</span>
                                        <span class="ps-block__estimate">Estimate for <strong>Viet Nam</strong>
                                            <a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="ps-block__shop">ROBERT’S STORE Shipping</span>
                                        <span class="ps-block__shipping">Free Shipping</span>
                                        <span class="ps-block__estimate">Estimate for <strong>Viet Nam</strong>
                                            <a href="#">Apple Macbook Retina Display 12” ×1</a>
                                        </span>
                                    </li>
                                </ul>
                                <h3>Total <span>$683.49</span></h3>
                            </div>
                        </div><a class="ps-btn ps-btn--fullwidth" href="checkout.html">Proceed to checkout</a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
