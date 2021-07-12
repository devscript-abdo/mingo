@extends('layouts.app')

@section('content')

      @include('theme.products.single.default.index')
      
@endsection

@section('productsJs')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    Livewire.hook('component.initialized', (component) => {
      function getColor(select) 
    {
      // alert(select.id);
      id = select.id;
      var attrsValue = document.getElementById('setColor');
      attrsValue.setAttribute('value',`${id}`);
    }
    })

  })
</script>


<script>
  
 // $(document).ready(function() {$('.singleProductsColors').select2();});
     
</script>

@endsection

@section('productsCss')


@endsection