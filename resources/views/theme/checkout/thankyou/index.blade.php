@extends('layouts.app')

@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
                <li>Order Success</li>
            </ul>
        </div>
    </div>

    <section class="ps-section--account">
        <div class="container">
            <div class="ps-block--payment-success">
                <h3>Order Success !</h3>
                <p>
                    Thanks for your Order. 
                    @auth('customer')
                       Please visit
                            <a href="{{route('customer.invoices.single',$order->slug)}}">
                                here
                            </a> 
                        to check your order status.
                    @endauth
                    <br> 
                    to check your order status: <strong>{{$order->full_number}}</strong>
                </p>
            </div>
        </div>
    </section>
  
</main>

@endsection

