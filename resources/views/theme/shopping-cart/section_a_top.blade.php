<div class="ps-breadcrumb" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
            <li><a href="{{route('products')}}">{{__('navbar.shop')}}</a></li>
            <li>{{__('navbar.shopping_cart')}}</li>
        </ul>
    </div>
</div>