<div class="ps-product-list ps-new-arrivals">

    <div class="ps-container"  dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
        <div class="ps-section__header">
            <h3>{{$collection->field('name')}}</h3>
            <ul class="ps-section__links">
              
                {{--@foreach($collection->products->unique('category') as $product)
                    <li>
                        <a href="{{$product->category->url}}">
                            {{$product->category->field('name')}}
                        </a>
                    </li>
                @endforeach--}}
                 
                <li><a href="{{route('products')}}">{{__('buttons.show_all')}}</a></li>
            </ul>
        </div>
        <div class="ps-section__content">
            <div class="row">
                @foreach($collection->products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail">
                                <a href="{{$product->url}}">
                                    <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{$product->url}}">

                                    {{$product->field('name')}}

                                </a>
                                <p class="ps-product__price">{{$product->price}} {{__('symbole.mad')}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach

          
            </div>
        </div>
    </div>
</div>