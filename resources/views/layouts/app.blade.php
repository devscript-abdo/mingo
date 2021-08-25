<!DOCTYPE html>
    @php
    $default = Mingo::currentLocale()
    @endphp
<html lang="{{$default}}" {{--dir="{{$default==='ar'?'rtl':''}}"--}}>
<head>

    <title>Mingo - Mingo ecommerce platform</title>

    @include('layouts.parts.meta')

    {{--@include('layouts.parts.fullLink')--}}

    @if($default === 'ar')
     
       {{--@include('layouts.parts.singleLinkRTL')--}}

       @include('layouts.parts.fullLinkRTL')

    @else
       {{--@include('layouts.parts.singleLink')--}}
       @include('layouts.parts.fullLink')

    @endif

    <link rel="stylesheet" href="{{asset('assets/css/_header_a.css')}}">
    @livewireStyles()
    @yield('checkoutCss')
    @yield('productsCss')

</head>

<body >

    @include('sections.__promo')

    @include('layouts.parts._header_a.__headerDesktop')
    {{--@include('layouts.parts.__headerDesktop')--}}
    @include('layouts.parts.__headerMobile') 
    @include('layouts.parts.__cartMobile')
    @include('layouts.parts.__categoriesMobile')
    @include('layouts.parts.__navListMobile')
    @include('layouts.parts.__searchMobile')
    @include('layouts.parts.__menuMobile')


       @yield('content')

       @livewire('newsletter.newsletter')

    {{--@include('sections.__popup_promo')--}}

    @include('layouts.parts.__footer')

    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    
    <div class="ps-site-overlay"></div>

    @include('sections.__loader')

    @include('sections.__search')
    
    {{--@include('sections.__modalQuickViewProduct')--}}

    @include('sections.__wishListGuest')


    {{--@livewire('product.modal-view')--}}
    @livewireScripts()

    @include('layouts.parts.fullScript')
    
    {{--@include('layouts.parts.singleScript')--}}

    @yield('productsJs')

    @yield('singleCartJs')

    @yield('checkoutJs')

    @yield('javascript')
    
  <!-------Powered By Haymacproduction (Elmarzougui Abdelghafour)------>
</body>
</html>