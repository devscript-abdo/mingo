{{--@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))--}}

@extends('layouts.app')

@section('content')
    <div class="ps-page--404">
        <div class="container">
            <div class="ps-section__content"><img src="{{asset('assets/img/404.jpg')}}" alt="Mingo.ma">
                <h3>ohh! page not found</h3>
                <p>It seems we can't find what you're looking for. Perhaps searching can help or go back to
                    <a href="{{route('home')}}"> {{__('navbar.home')}}</a></p>
                <form class="ps-form--widget-search" action="" method="get">
                    <input class="form-control" type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
