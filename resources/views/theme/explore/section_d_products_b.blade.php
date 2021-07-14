<div class="ps-block--categories-box">
    <div class="ps-block__header">
        <h3>Consumer Electronics</h3>
        <ul>
            <li><a href="shop-default.html">New Arrivals</a></li>
            <li><a href="shop-default.html">Best Seller</a></li>
        </ul>
    </div>
    <div class="ps-block__content">
        <div class="ps-block__banner"><img src="img/categories/electronic/large.jpg" alt=""></div>
        @foreach ($products as $product)
            <div class="ps-block__item">
                <a class="ps-block__overlay" href="shop-default.html"></a><img src="{{$product->photo}}" alt="">
                <p>{{$product->field('name')}}</span>
            </div>
        @endforeach
 
    </div>
</div>