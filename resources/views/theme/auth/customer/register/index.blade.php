@extends('layouts.app')

@section('content')

    <div class="ps-page--my-account" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
        
        @include('theme.auth.customer.register.section_a_top')
        @include('theme.auth.customer.register.section_b_form')

    </div>

@endsection