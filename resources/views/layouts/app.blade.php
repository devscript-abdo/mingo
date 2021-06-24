<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Mingo - Mingo ecommerce platform</title>

    @include('layouts.parts.meta')

    @include('layouts.parts.fullLink')
    @livewireStyles()
    @yield('checkoutCss')

</head>

<body>

    @include('layouts.parts.__headerDesktop')
    @include('layouts.parts.__headerMobile') 
    @include('layouts.parts.__cartMobile')
    @include('layouts.parts.__categoriesMobile')
    @include('layouts.parts.__navListMobile')
    @include('layouts.parts.__searchMobile')
    @include('layouts.parts.__menuMobile')

    <div id="homepage-1">

       @yield('content')

    </div>
    
    {{--@include('sections.__popup_promo')--}}

    @include('layouts.parts.__footer')

    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    
    <div class="ps-site-overlay"></div>

    @include('sections.__loader')
    @include('sections.__search')
    
    {{--@include('sections.__modalQuickViewProduct')--}}

    @livewire('product.modal-view')

    @include('layouts.parts.fullScript')

    @livewireScripts()

    @yield('productsJs')

    @yield('singleCartJs')

    @yield('checkoutJs')
    

</body>
</html>