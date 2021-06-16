<div>
    <div class="ps-product--detail ps-product--fullwidth">
        <div class="ps-product__header">
            <div class="ps-product__thumbnail" data-vertical="true">
                <figure>
                    <div class="ps-wrapper">
                        <div class="ps-product__gallery" data-arrow="true">
                            @foreach($product->all_photos as $photo)
                                <div class="item">
                                    <a href="{{$product->singlePhoto($photo)}}">
                                        <img src="{{$product->singlePhoto($photo)}}" alt="{{$product->field('name')}}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </figure>
                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                    @foreach($product->all_photos as $photo)
                        <div class="item">
                            
                           <img src="{{$product->singlePhoto($photo)}}" alt="{{$product->field('name')}}">
                            
                        </div>
                        
                    @endforeach
                </div>
            </div>
            <div class="ps-product__info">
                <h1>{{$product->field('name')}}</h1>
                <div class="ps-product__meta">
                    @if($product->brand)
                    <p>Brand : <a href="{{$product->brand->url}}">{{$product->brand->name}}</a></p>
                    @endif
                    <div class="ps-product__rating">
                        <select class="ps-rating" data-read-only="true">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                        </select><span>(1 review)</span>
                    </div>
                </div>
                <h4 class="ps-product__price">{{$product->price}}</h4>
                <div class="ps-product__desc">
                    {{--<p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>--}}
                    {{--<ul class="ps-list--dot">
                        <li> {{$product->field('description')}}</li>
                      
                    </ul>--}}
    
                    <p>{{$product->field('description')}}</p>
                </div>
                <form wire:submit.prevent="addToCart({{$product->id}})">
                    @csrf
                    <div class="ps-product__variations">
                        <figure>
                            <figcaption>Color</figcaption>
                            @foreach($product->colors as $color)
                                {{--<div class="ps-variant ps-variant--color" style="background-color: {{$color->code}}; !important">
                                    <span class="ps-variant__tooltip">{{$color->field('name')}}</span>
                                </div>--}}
                                <div class="ps-checkbox ps-checkbox--color  ps-checkbox--inline" style="border-radius:30%; background-color: {{$color->code}}; !important">
                                    <input 
                                    class="form-control" 
                                    type="checkbox" 
                                    id="color-{{$color->slug}}" 
                                    name="size"
                                    
                                    >
                                    <label for="color-{{$color->slug}}"></label>
                                </div>
                            @endforeach
                        </figure>
                    </div>
                    <div class="ps-product__shopping">
                        <figure>
                            <figcaption>Quantity</figcaption>
                            <div class="form-group--number">
                                {{--<button class="up"><i class="fa fa-plus"></i></button>
                                <button class="down"><i class="fa fa-minus"></i></button>--}}
                                <input wire:model.defer="quantity.{{$product->id}}" class="form-control" type="number" >
                            </div>
                        </figure>
                        @if($cart->where('id',$product->id)->count())
                        <button class="ps-btn ps-btn--black disabled" disabled>Already in cart</button>
                        @else
                        <button type="submit" class="ps-btn ps-btn--black" href="#">Add to cart</button>
                        @endif

                        <a class="ps-btn" href="#">Buy Now</a>
                        <div class="ps-product__actions">
                            <a href="#"><i class="icon-heart"></i></a>
                            <a href="#"><i class="icon-chart-bars"></i></a>
                        </div>
                    </div>
                </form>

                <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                    <p><strong>SKU:</strong> {{$product->sku}}</p>
                    <p class="categories"><strong> Categories:</strong>
                        <a href="{{$product->category->url}}">{{$product->category->field('name')}}</a>
                        {{--<a href="#"> Refrigerator</a>,
                        <a href="#">Babies & Moms</a></p>--}}
                    <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                </div>
                <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
        </div>
        <div class="ps-product__content ps-tab-root">
            <ul class="ps-tab-list">
                <li class="active"><a href="#tab-1">Description</a></li>
                <li><a href="#tab-2">Specification</a></li>
                {{--<li><a href="#tab-3">Vendor</a></li>--}}
                <li><a href="#tab-4">Reviews (1)</a></li>
                {{--<li><a href="#tab-5">Questions and Answers</a></li>--}}
                {{--<li><a href="#tab-6">More Offers</a></li>--}}
            </ul>
            <div class="ps-tabs">
                <div class="ps-tab active" id="tab-1">
                    <div class="ps-document">
                        {!! $product->field('content') !!}                 
                    </div>
                </div>
                <div class="ps-tab" id="tab-2">
                    <div class="table-responsive">
                        <table class="table table-bordered ps-table ps-table--specification">
                            <tbody>
                                <tr>
                                    <td>Color</td>
                                    <td>Black, Gray</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Ear Hook</td>
                                </tr>
                                <tr>
                                    <td>Wireless</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Dimensions</td>
                                    <td>5.5 x 5.5 x 9.5 inches</td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td>6.61 pounds</td>
                                </tr>
                                <tr>
                                    <td>Battery Life</td>
                                    <td>20 hours</td>
                                </tr>
                                <tr>
                                    <td>Bluetooth</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--<div class="ps-tab" id="tab-3">
                    <h4>GoPro</h4>
                    <p>Digiworld US, New York’s no.1 online retailer was established in May 2012 with the aim and vision to become the one-stop shop for retail in New York with implementation of best practices both online</p><a href="#">More Products from gopro</a>
                </div>--}}
                <div class="ps-tab" id="tab-4">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--average-rating">
                                <div class="ps-block__header">
                                    <h3>4.00</h3>
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>1 Review</span>
                                </div>
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                            <form class="ps-form--review" action="http://nouthemes.net/html/martfury/index.html" method="get">
                                <h4>Submit Your Review</h4>
                                <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                <div class="form-group form-group__rating">
                                    <label>Your rating of this product</label>
                                    <select class="ps-rating" data-read-only="false">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--<div class="ps-tab" id="tab-5">
                    <div class="ps-block--questions-answers">
                        <h3>Questions and Answers</h3>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                        </div>
                    </div>
                </div>--}}
                {{--<div class="ps-tab active" id="tab-6">
                    <p>Sorry no more offers available</p>
                </div>--}}
            </div>
        </div>
    </div>
</div>
