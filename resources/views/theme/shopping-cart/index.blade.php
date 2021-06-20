@extends('layouts.app')

@section('content')

<div class="ps-page--simple">

    @include('theme.shopping-cart.section_a_top')

    {{--@include('theme.shopping-cart.section_b_cart_list')--}}

    @livewire('cart.cart')
    
</div>

@endsection

@section('couponJs')

<script type="text/javascript">
    $(".deleteCouponFromCart").click(function (e) {
        e.preventDefault()
        var ele = $(this);
        //console.log(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{route('coupon.delete')}}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}'},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection

