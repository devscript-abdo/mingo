<form class="ps-form--quick-search" action="" method="get">
    <div class="form-group--icon"><i class="icon-chevron-down"></i>
        <select class="form-control">
            <option value="0" selected="selected">{{__('navbar.search_all')}}</option>
            <option class="level-0" value="babies-moms">Babies & Moms</option>
            <option class="level-0" value="books-office">Books & Office</option>
            <option class="level-0" value="cars-motocycles">Cars & Motocycles</option>
            <option class="level-0" value="clothing-apparel">Clothing & Apparel</option>
        </select>
    </div>
    <input class="form-control" type="text" placeholder="" id="input-search">
    <button>{{__('navbar.search_button')}}</button>
    <div class="ps-panel--search-result">
        <div class="ps-panel__content">
            <div class="ps-product ps-product--wide ps-product--search-result">
                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/1.jpg')}}" alt=""></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 32GB</a>
                    <div class="ps-product__rating">
                        <select class="ps-rating" data-read-only="true">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                        </select><span></span>
                    </div>
                    <p class="ps-product__price">$990.50</p>
                </div>
            </div>
            <div class="ps-product ps-product--wide ps-product--search-result">
                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{asset('assets/img/products/arrivals/1.jpg')}}" alt=""></a></div>
                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                    <div class="ps-product__rating">
                        <select class="ps-rating" data-read-only="true">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                        </select><span></span>
                    </div>
                    <p class="ps-product__price">$1120.50</p>
                </div>
            </div>
   
        </div>
        <div class="ps-panel__footer text-center"><a href="shop-default.html">See all results</a></div>
    </div>
</form>