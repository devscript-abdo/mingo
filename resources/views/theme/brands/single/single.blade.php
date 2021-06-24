@extends('layouts.app')

@section('content')
      @include('theme.products.single.default.index')
@endsection

@section('productsJs')
<script>
    window.addEventListener('added_to_cart', event => {
        
      // window.location.reload();
        
    })
</script>
@endsection