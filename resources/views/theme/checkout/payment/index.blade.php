@extends('layouts.app')

@section('content')

<main class="ps-page--my-account">

  @include('theme.checkout.payment.section_a_top')
  
  @include('theme.checkout.payment.section_b_content')

</main>

@endsection

@section('javascript')

<script>

    function setPaymentMethod(select) 
    {
      //select.preventDefault();
      id = select.dataset.payment;
      var method = document.getElementById('cod_payment_method');
      method.setAttribute('value',`${id}`);
      select.innerHTML='<i class="fa fa-spinner fa-spin"></i>';
    
     // method.dispatchEvent(new Event('input')); // this method used to catch input value from this function for livewire
    }
</script>

@endsection