@extends('layouts.app')

@section('content')

@include('theme.explore.section_a_top')

<div class="ps-page--shop">
    <div class="ps-container">

        @include('theme.explore.section_b_banner')
        @include('theme.explore.section_c_brand')
        @include('theme.explore.section_d_products')
        
    </div>
</div>

@endsection