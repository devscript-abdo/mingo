@extends('layouts.app')

@section('content')

<div class="ps-page--simple">

    @include('theme.shopping-cart.section_a_top')

    {{--@include('theme.shopping-cart.section_b_cart_list')--}}

    @livewire('cart.cart')
    
</div>

@endsection

