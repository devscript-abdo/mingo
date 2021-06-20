<div class="ps-checkout ps-section--shopping">
    <div class="container">
        <div class="ps-section__header">
            <h1>Checkout OK</h1>
            @if(session()->has('success_message'))
              <div class="alert alert-success">
                  {{session()->get('success_message')}}
              </div>
            @endif
        </div>
        <div class="ps-section__content">
            <form class="ps-form--checkout"  action="{{route('checkout.post')}}" method="post">
                @csrf
                <div class="row">

                    @include('theme.checkout.__form')

                    <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
                        <div class="ps-form__total">
                            <h3 class="ps-form__heading">Your Order</h3>
                            <div class="content">
                                <div class="ps-block--checkout-total">
                                    <div class="ps-block__header">
                                        <p>Product</p>
                                        <p>Total</p>
                                    </div>
                                    <div class="ps-block__content">
                                        <table class="table ps-block__products">
                                            <tbody>
                                                @foreach($itemes as $item)
                                                    
                                                    <tr>
                                                        <td>
                                                            <a href="{{$item->options->url}}"> {{$item->name}}</a>
                                                            <br>
                                                            {{$item->price}} × {{$item->qty}}
                                                            {{--<p>Sold By:<strong>YOUNG SHOP</strong></p>--}}
                                                        </td>
                                                        <td>{{$item->price * $item->qty}} MAD</td>
                                                    </tr>
                      
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <h4 class="ps-block__title">Subtotal <span>{{$subTotal}} MAD</span></h4>
                                        {{--<div class="ps-block__shippings">
                                            <figure>
                                                <h4>YOUNG SHOP Shipping</h4>
                                                <p>Free shipping</p><a href="#"> MVMTH Classical Leather Watch In Black ×1</a>
                                            </figure>
                                            <figure>
                                                <h4>ROBERT’S STORE Shipping</h4>
                                                <p>Free shipping</p><a href="#">Apple Macbook Retina Display 12” ×1</a>
                                            </figure>
                                        </div>--}}
                                        <h3>Total <span>{{$totalPrice}} MAD</span></h3>
                                    </div>
                                </div>
                                <button type="submit" class="ps-btn ps-btn--fullwidth">Proceed to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>