<div class="ps-top-categories">
    <div class="ps-container">
        <h3>{{__('homePage.top_categories')}}</h3>
        <div class="row {{--justify-content-center--}}">
            @foreach($categoriesOfYear as $category)

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                    <div class="ps-block--category">
                        <a class="ps-block__overlay" href="{{$category->url}}"></a>
                        <img src="{{$category->photo}}" alt="{{$category->field('name')}}">
                        <p>{{$category->field('name')}}</p>
                    </div>
                </div>

            @endforeach
   
        </div>
    </div>
</div>