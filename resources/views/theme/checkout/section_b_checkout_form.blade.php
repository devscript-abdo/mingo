<div dir="ltr" class="ps-checkout ps-section--shopping">
    <div class="container">
        <div class="ps-section__header">
            <h1>{{__('checkoutPage.checkout_title')}}</h1>
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
                            <h3 class="ps-form__heading">{{__('checkoutPage.checkout_details')}}</h3>
                            <div class="content">
                                <div class="ps-block--checkout-total">
                                    <div class="ps-block__header">
                                        <p>{{__('checkoutPage.checkout_product')}}</p>
                                        <p>{{__('checkoutPage.checkout_total')}}</p>
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
                                                            
                                                            @if($item->options->attributesData)      
                                                                <p> <i> variants :</i></p>
                                                                @foreach ($item->options->attributesData as $key => $value)
                                                                
                                                                <p> {{$key}} : <strong> {{$value}}</strong></p>
                                                                
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>{{$item->price * $item->qty}} {{__('symbole.mad')}}</td>
                                                    </tr>
                      
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{--<h4 class="ps-block__title">
                                            Subtotal <span>{{$subTotal}} MAD</span>
                                        </h4>--}}
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
                                        <h3>{{__('checkoutPage.checkout_total')}} <span>{{$totalPrice}} {{__('symbole.mad')}}</span></h3>
                                    </div>
                                </div>
                                <button type="submit" class="ps-btn ps-btn--fullwidth">{{__('checkoutPage.checkout_button')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>