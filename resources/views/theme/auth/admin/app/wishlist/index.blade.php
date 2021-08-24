@extends('layouts.app')

@section('content')

<div class="ps-page--simple" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">

    @include('theme.auth.customer.app.wishlist.section_a_top')

    @include('theme.auth.customer.app.wishlist.section_b_wishlist')
    
</div>

@endsection