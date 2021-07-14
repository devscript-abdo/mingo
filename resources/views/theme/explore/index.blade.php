@extends('layouts.app')

@section('content')

@include('theme.explore.section_a_top')

<div class="ps-page--shop">
    <div class="ps-container">
        <h1>Explore functionality : <i style="color:red">TEST Mode</i></h1>

        @include('theme.explore.section_b_banner')
        @include('theme.explore.section_c_brand')
        @include('theme.explore.section_d_products')

    </div>
</div>

@endsection