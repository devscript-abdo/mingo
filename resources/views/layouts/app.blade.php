<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Mingo - Mingo ecommerce platform</title>

    @include('layouts.parts.meta')

    @include('layouts.parts.fullLink')
    @livewireStyles()

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
    @include('sections.__modalQuickViewProduct')

    @include('layouts.parts.fullScript')
    @yield('productsJs')
    @yield('singleCartJs')
    @livewireScripts()

</body>
</html>