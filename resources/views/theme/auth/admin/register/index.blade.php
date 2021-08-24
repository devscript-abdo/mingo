@extends('layouts.app')

@section('content')

    <div class="ps-page--my-account" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
        
        @include('theme.auth.admin.register.section_a_top')
        @include('theme.auth.admin.register.section_b_form')

    </div>

@endsection