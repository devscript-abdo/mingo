<div class="ps-block--shop-features">
    <div class="ps-block__header">
        <h3>Best Sale Items</h3>
        <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended1"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended1"><i class="icon-chevron-right"></i></a></div>
    </div>
    <div class="ps-block__content">
        <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
            @for($i=1;$i<=6;$i++)
            <div class="ps-product">
                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/shop/best/1.jpg')}}" alt=""></a>
                    <ul class="ps-product__actions">
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                    </ul>
                </div>
                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                        <div class="ps-product__rating">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                            </select><span>01</span>
                        </div>
                        <p class="ps-product__price">$22.99 - $32.99</p>
                    </div>
                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                        <p class="ps-product__price">$22.99 - $32.99</p>
                    </div>
                </div>
            </div>
            @endfor
       
        </div>
    </div>
</div>