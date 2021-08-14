@extends('layouts.app')

@section('content')

    <main class="ps-page--my-account">

        @include('theme.auth.customer.app.logged.section_a_top')

        <section class="ps-section--account">

            <div class="container">

                <div class="row">

                    @include('theme.auth.customer.app.navbar')
                    
                    @include('theme.auth.customer.app.logged.section_b_table')

                </div>
                
            </div>

        </section>

    </main>

@endsection