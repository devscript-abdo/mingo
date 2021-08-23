@extends('layouts.app')

@section('content')
<main class="ps-page--my-account" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
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
                <h3>{{__('thankyouPage.order_success')}}</h3>
                <p>
                    {{__('thankyouPage.order_success_message')}}
                    @auth('customer')
                    {{__('thankyouPage.order_success_message_a')}}
                            <a href="{{route('customer.invoices.single',$order->slug)}}">
                                {{__('thankyouPage.order_success_message_b')}}
                            </a> 
                       
                    @endauth
                    <br> 
                    {{__('thankyouPage.order_number')}} : <strong>{{$order->full_number}}</strong>
                </p>
            </div>
        </div>
    </section>
  
</main>

@endsection

