<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>{{__('customer.customer_order')}} # {{$order->full_number}} - <strong>{{$order->status}}</strong></h3>
            </div>
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <figure class="ps-block--invoice">
                            <figcaption>{{__('customer.customer_order_detail_name')}}</figcaption>
                            <div class="ps-block__content"><strong>{{$order->billing_name}}</strong>
                                <p>{{__('customer.customer_order_detail_address')}} : {{$order->billing_address}}, {{$order->billing_city}}</p>
                                <p>{{__('customer.customer_order_detail_tele')}} : {{$order->billing_phone}}</p>
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
                            <figcaption>{{__('customer.customer_order_detail_payment')}}</figcaption>
                            <div class="ps-block__content">
                                <p>{{__('customer.customer_order_detail_payment_method')}} : {{$order->payment_gateway}}</p>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table ps-table">
                        <thead>
                            <tr>
                                <th>{{__('customer.customer_order_product')}}</th>
                                <th>{{__('customer.customer_order_price')}}</th>
                                <th>{{__('customer.customer_order_qte')}}</th>
                                <th>{{__('customer.customer_order_total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($order->products as $product)
                                <tr>
                                    <td>
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="{{$product->url}}">
                                                <img src="{{$product->photo}}" alt="{{$product->field('name')}}"></a>
                                            </div>
                                            <div class="ps-product__content"><a href="{{$product->url}}">
                                                {{$product->field('name')}}
                                            </a>
                                                <p>Sold By : <strong> YOUNG SHOP </strong></p>
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
                <a class="ps-btn ps-btn--sm" href="#" onclick="document.getElementById('generateInvoice').submit();">
                   Imprimer
                </a>
                <a class="ps-btn ps-btn--sm" href="{{route('customer.invoices')}}">
                    {{__('customer.customer_order_back')}}
                </a>
            </div>
            <form action="{{route('customer.invoices.generate',$order->slug)}}" method="post" hidden id="generateInvoice">
                @csrf
                @honeypot
                <input type="hidden" name="order" value="{{$order->slug}}">
            </form>
        </div>
    </div>
</div>