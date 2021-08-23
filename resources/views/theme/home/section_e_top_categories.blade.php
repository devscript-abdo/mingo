<div class="ps-top-categories" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="ps-container">
        <h3>{{__('homePage.top_categories')}}</h3>
        <div class="row justify-content-center">
            @foreach($brands as $brand)

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                    <div class="ps-block--category">
                        <a class="ps-block__overlay" href="{{$brand->url}}"></a>
                        <img src="{{$brand->photo}}" alt="{{$brand->name}}">
                        <p>{{$brand->name}}</p>
                    </div>
                </div>

            @endforeach
   
        </div>
    </div>
</div>