@extends('layouts.app')

@section('content')

    <div class="ps-page--my-account">
        
        @include('theme.auth.customer.verify.section_a_top')
        
        @include('theme.auth.customer.verify.section_b_content')

    </div>

@endsection