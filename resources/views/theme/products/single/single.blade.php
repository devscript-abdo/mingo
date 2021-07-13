@extends('layouts.app')

@section('content')

      @include('theme.products.single.default.index')
      
@endsection

@section('productsJs')

<script>

    function getColor(select) 
    {
      // alert(select.id);
      id = select.id;
      var attrsValue = document.getElementById('setColor');
      attrsValue.setAttribute('value',`${id}`);
    
      attrsValue.dispatchEvent(new Event('input')); // this method used to catch input value from this function for livewire
    }

    function getAttributeData(element)
    {
           //alert(element.id);
      id = element.id;
      var attrsValue = document.getElementById('setAttributeData'+element.dataset.name);
      console.log(attrsValue);
      attrsValue.setAttribute('value',`${id}`);
    
      attrsValue.dispatchEvent(new Event('input')); // this method used to catch input value from this function for livewire
    }
</script>


<script>
  
 // $(document).ready(function() {$('.singleProductsColors').select2();});
     
</script>

@endsection

@section('productsCss')


@endsection