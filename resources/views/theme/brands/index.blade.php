@extends('layouts.app')

@section('content')
      @include('theme.brands.default.index')
@endsection

@section('productsJs')

<script>

    function filterCategory(value){

        let filter = value;
    
        window.location = `{{route('products')}}?mingoFilter[GetCategory]=${value}`;
    }

    function filterBrand(value){

        let filter = value;

        //console.log('haymacproduction.ma');
    
        window.location = `{{route('products')}}?mingoFilter[GetBrand]=${value}`;  
    }

    function filterColor(value){

      let filter = value;

      //console.log('haymacproduction.ma');

      window.location = `{{route('products')}}?mingoFilter[GetColor]=${value}`;  
      }

</script>

@endsection