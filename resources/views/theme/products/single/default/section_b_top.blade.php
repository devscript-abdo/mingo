<div class="ps-breadcrumb" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="ps-container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
            <li><a href="{{$product->category->url}}">{{$product->category->field('name')}}</a></li>
           
            <li>{{$product->field('name')}}</li>
        </ul>
    </div>
</div>