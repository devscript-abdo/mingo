<div class="ps-shop-categories">
    <div class="row align-content-lg-stretch">

        @foreach ($products as $product)
            
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                <div class="ps-block--category-2" data-mh="categories">
                    <div class="ps-block__thumbnail">
                        <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                    </div>
                    <div class="ps-block__content">
                        <h4>{{$product->field('name')}}</h4>
                        {{--<ul>
                            <li><a href="shop-default.html">Accessories</a></li>
                        </ul>--}}
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>