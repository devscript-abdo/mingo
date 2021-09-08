<div class="modal fade" 
    id="product-quickview-{{$product->slug}}" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="product-quickview-{{$product->slug}}" 
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail" data-vertical="false">
                        <div class="ps-product__images" data-arrow="true">
                            <div class="item">
                              
                                    <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                            
                            </div>
                            {{--@foreach($product->all_photos as $photo)
                  
                                <div class="item">
                                   
                                    <img src="{{$photo}}" alt="{{$product->field('name')}}">
                                 
                                </div>
                            
                            @endforeach--}}
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h4>{{$product->field('name')}}</h4>
                        <div class="ps-product__meta">
                            <p>Brand:<a href="shop-default.html">Sony</a></p>
                        </div>
                        <h4 class="ps-product__price">{{$product->formated_price}} {{__('symbole.mad')}}</h4>
                        <div class="ps-product__desc">
                     
                            {{--<ul class="ps-list--dot">
                                <li> Unrestrained and portable active stereo speaker</li>
                            </ul>--}}
                        </div>
                        <div class="ps-product__shopping">

                            <a 
                                class="ps-btn ps-btn--black" 
                                href="#"
                                wire:click="addToCartHome({{$product->id}})"
                                onclick="return false;"
                            >
                                Add to cart
                            </a>
                            
                            <a class="ps-btn" href="#">
                                Buy Now
                            </a>
                            <div class="ps-product__actions">
                                <a href="#"><i class="icon-heart"></i></a>
                                <a href="#"><i class="icon-chart-bars"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>