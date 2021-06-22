@extends('layouts.app')

@section('content')
<main class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
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
                            <a href="{{route('customer.invoices.single',$order)}}">
                                here
                            </a> 
                        to check your order status.
                    @endauth
               
                </p>
            </div>
        </div>
    </section>
  
</main>

@endsection

