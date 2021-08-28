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

{{--<script src="{{asset('assets/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>


<script>

$('#product-zoom').elevateZoom({
            gallery:'product-zoom-gallery',
            galleryActiveClass: 'active',
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 400,
            zoomWindowFadeOut: 400,
            responsive: true
}); 
       
$('.item').on('click', function (e) {
  console.log('OOOOO');
            $('#product-zoom-gallery').find('div').removeClass('active');
            $(this).addClass('active');

            e.preventDefault();
});
</script>--}}
 
@endsection

