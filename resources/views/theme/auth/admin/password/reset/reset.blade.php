@extends('layouts.app')

@section('content')

    <div class="ps-page--my-account">
        
        @include('theme.auth.customer.password.section_a_top')

        <div class="ps-my-account">

            <div class="container">

               @include('theme.auth.customer.password.reset.__form')

            </div>
            
        </div>

    </div>

@endsection