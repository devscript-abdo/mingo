@extends('layouts.app')

@section('content')

    <div class="ps-page--my-account">
        
        @include('theme.auth.customer.password.section_a_top')
        @include('theme.auth.customer.password.section_b_form')

    </div>

@endsection