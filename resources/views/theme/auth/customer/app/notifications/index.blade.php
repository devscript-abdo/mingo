@extends('layouts.app')

@section('content')

    <main class="ps-page--my-account" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">

        @include('theme.auth.customer.app.notifications.section_a_top')

        <section class="ps-section--account">

            <div class="container">

                <div class="row">

                    @include('theme.auth.customer.app.navbar')
                    
                    @include('theme.auth.customer.app.notifications.section_b_table')

                </div>
                
            </div>

        </section>

    </main>

@endsection