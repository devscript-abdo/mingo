@extends('layouts.app')

@section('content')

    <main class="ps-page--my-account" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">

        @include('theme.auth.admin.app.orders.detail.section_a_top')

        <section class="ps-section--account">

            <div class="container">

                <div class="row">

                    @include('theme.auth.admin.app.navbar')
                    
                    @include('theme.auth.admin.app.orders.detail.section_b_detail')

                </div>
                
            </div>

        </section>

    </main>

@endsection

@section('javascript')
 @include('layouts.javascript.singleOrder')
@endsection