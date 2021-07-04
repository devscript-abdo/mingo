<div class="ps-shopping ps-tab-root">
    <div class="ps-shopping__header">
        <p><strong> {{count($products)}}</strong> Products found</p>
        <div class="ps-shopping__actions">
            <select class="ps-select" data-placeholder="Sort Items">
                <option>Sort by latest</option>
                <option>Sort by popularity</option>
                <option>Sort by average rating</option>
                <option>Sort by price: low to high</option>
                <option>Sort by price: high to low</option>
            </select>
            <div class="ps-shopping__view">
                <p>View</p>
                <ul class="ps-tab-list">
                    <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                    <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ps-tabs">
        <div class="ps-tab active" id="tab-1">
            <div class="ps-shopping-product">
                <div class="row">
                    @foreach($products as $product)
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{$product->url}}">
                                            <img src="{{$product->photo}}" alt="{{$product->field('name')}}"></a>
                                        <ul class="ps-product__actions">
                                            <li>
                                                <a 
                                                    wire:click="addToCart({{$product->id}})"
                                                    href="#" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="{{__('buttons.add_to_cart')}}"
                                                >
                                                    <i class="icon-bag2"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a 
                                                    {{--wire:click="openModalView({{$product->id}})"--}}
                                                    href="#" 
                                                    data-placement="top"
                                                    title="Quick View"
                                                    data-toggle="modal"
                                                    data-target="#product-quickview"
                                                    
                                                >
                                                    <i class="icon-eye"></i>
                                                </a>
                                            </li>
                                            @auth('customer')
                                            <li>
                                                <a
                                                wire:click="addToWishList({{$product->id}})"
                                                href="#" 
                                                data-toggle="tooltip" 
                                                data-placement="top" 
                                                title="{{__('buttons.add_to_wish')}}"
                                                >
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </li>
                                            @endauth
                                            {{--<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
                                        </ul>
                                    </div>
                                    <div class="ps-product__container">
                                        <a class="ps-product__vendor" href="{{$product->category->url}}">
                                            {{$product->category->field('name')}}
                                        </a>
                                        <div class="ps-product__content">
                                            <a class="ps-product__title" href="{{$product->url}}">{{$product->field('name')}}</a>
                                            <p class="ps-product__price">{{$product->price}} {{__('symbole.mad')}}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{$product->url}}">{{$product->field('name')}}</a>
                                            <p class="ps-product__price">{{$product->price}} {{__('symbole.mad')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="ps-tab" id="tab-2">
            <div class="ps-shopping-product">
                @foreach($products as $product)
                    <div class="ps-product ps-product--wide">
                        <div class="ps-product__thumbnail"><a href="{{$product->url}}"><img src="{{$product->photo}}" alt=""></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content"><a class="ps-product__title" href="{{$product->url}}">{{$product->field('name')}}</a>
                                <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                <ul class="ps-product__desc">
                                    <li>{{$product->field('description')}}</li>
                                    
                                </ul>
                            </div>
                            <div class="ps-product__shopping">
                                <p class="ps-product__price">$1310.00</p><a class="ps-btn" href="#">Add to cart</a>
                                <ul class="ps-product__actions">
                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>