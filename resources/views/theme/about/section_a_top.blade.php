<div class="ps-breadcrumb" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
            <li>{{$about->field('title')}}</li>
        </ul>
    </div>
</div>