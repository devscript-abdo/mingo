<div class="ps-product-list ps-clothings" >
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>{{$category->field('name')}}</h3>
            <ul class="ps-section__links">
                @foreach($category->products as $product)

                  @foreach ($product->productCollections->unique('productCollections') as $collection )

                    <li><a href="{{$collection->url}}">{{$collection->field('name')}}</a></li>

                  @endforeach

                @endforeach
            </ul>
        </div>
        <div class="ps-section__content">
            <div  dir="ltr"
                class="ps-carousel--responsive owl-slider" 
                data-owl-auto="true" 
                data-owl-loop="true" 
                data-owl-speed="10000" 
                data-owl-gap="0" 
                data-owl-nav="false" 
                data-owl-dots="true" 
                data-owl-item="7" 
                data-owl-item-xs="2" 
                data-owl-item-sm="2" 
                data-owl-item-md="2" 
                data-owl-item-lg="4" 
                data-owl-item-xl="6" 
                data-owl-duration="1000" 
                data-owl-mousedrag="on"
               >
               <!----------------- Haymacproduction ------------------------->
                @foreach ($category->products as $product )
        
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="{{$product->url}}">
                              <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                            </a>
                            <div class="ps-product__badge">-16%</div>
                            <ul class="ps-product__actions">
                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="{{__('buttons.add_to_cart')}}">
                                        <i class="icon-bag2"></i>
                                    </a>
                                </li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <a class="ps-product__vendor" href="{{$product->getBrand('url')}}">
                                {{$product->getBrand('name')}}
                            </a>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{$product->url}}">
                                    {{$product->field('name')}}
                                </a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>01</span>
                                </div>
                                <p class="ps-product__price sale">{{$product->price}} {{__('symbole.mad')}} <del>{{$product->price}} {{__('symbole.mad')}}</del></p>
                            </div>
                            <div class="ps-product__content hover">
                                <a class="ps-product__title" href="{{$product->url}}">{{$product->field('name')}}</a>
                                <p class="ps-product__price sale">{{$product->price}} {{__('symbole.mad')}} <del>{{$product->price}} {{__('symbole.mad')}}</del></p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>