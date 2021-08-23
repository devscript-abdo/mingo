@extends('layouts.app')

@section('content')

    @include('theme.about.section_a_top')

    <div class="ps-page--single" id="about-us" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">

        <img src="{{$about->photo}}" alt="{{$about->field('title')}}">

        @include('theme.about.section_b_intro')
        @include('theme.about.section_c_team')
        @include('theme.about.section_d_award')

    </div>
@endsection