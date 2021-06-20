@extends('layouts.app')

@section('content')

<div class="ps-page--simple">

    @include('theme.checkout.section_a_top')

    @include('theme.checkout.section_b_checkout_form')

</div>

@endsection


@section('checkoutJs')
 <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('checkoutCss')

@endsection
