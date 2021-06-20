<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>Order #{{$order->full_number}} -<strong>Successful delivery</strong></h3>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <figure class="ps-block--invoice">
                            <figcaption>Address</figcaption>
                            <div class="ps-block__content"><strong>{{$order->billing_name}}</strong>
                                <p>Address: {{$order->billing_address}}, {{$order->billing_city}}</p>
                                <p>Phone: {{$order->billing_phone}}</p>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-12">
                        <figure class="ps-block--invoice">
                            <figcaption>Shipping Fee</figcaption>
                            <div class="ps-block__content">
                                <p>Shipping Fee: Free</p>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-12">
                        <figure class="ps-block--invoice">
                            <figcaption>Payment</figcaption>
                            <div class="ps-block__content">
                                <p>Payment Method: Cash On delivery</p>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table ps-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($order->products as $product)
                            <tr>
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail"><a href="{{$product->url}}">
                                            <img src="{{$product->photo}}" alt=""></a>
                                        </div>
                                        <div class="ps-product__content"><a href="{{$product->url}}">
                                            {{$product->field('name')}}
                                        </a>
                                            <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                        </div>
                                    </div>
                                </td>
                                <td><span><i>MAD</i> {{$product->price}} </span></td>
                                <td>{{$product->pivot->quantity}}</td>
                                <td><span><i>MAD</i> {{$product->pivot->quantity * $product->price}}</span></td>
                            </tr>
                            @endforeach
                 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ps-section__footer">
                <a class="ps-btn ps-btn--sm" href="{{route('customer.invoices')}}">Back to invoices</a>
            </div>
        </div>
    </div>
</div>