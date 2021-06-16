@extends('layouts.app')

@section('content')

<div class="ps-page--simple">

    @include('theme.shopping-cart.section_a_top')

    {{--@include('theme.shopping-cart.section_b_cart_list')--}}

    @livewire('cart.cart')
    
</div>

@endsection

@section('singleCartJs')

    <script type="text/javascript">

        /*window.onload = function() {
        if(!window.location.hash) {
            window.location = window.location + '#loadedMailletex';
            window.location.reload();
        }
    }*/
      
        $(".deleteProductFromCart").click(function (e) {
            e.preventDefault()
            console.log('OoOoO');
           
            var ele = $(this);
            //console.log(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{route('shoppingcart.delete')}}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-prodid")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>

@endsection
