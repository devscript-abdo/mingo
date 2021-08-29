<aside class="widget widget_shop">
    <h4 class="widget-title">Marque</h4>
    {{--<form class="ps-form--widget-search" action="" method="get">
        <input class="form-control" type="text" placeholder="">
        <button><i class="icon-magnifier"></i></button>
    </form>--}}
    <figure class="ps-custom-scrollbar" data-height="250">

        @foreach($brands as $brand)
            <div class="ps-checkbox">
                <input class="form-control" type="checkbox" id="brand-{{$brand->id}}" name="brand">
                <label for="brand-{{$brand->id}}">{{$brand->name}}</label>
            </div>
        @endforeach

    </figure>
    {{--<figure>
        <h4 class="widget-title">Prix</h4>
        <div id="nonlinear"></div>
        <p class="ps-slider__meta">Prix:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>
    </figure>
    <figure>
        <h4 class="widget-title">Prix</h4>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-1" name="review">
            <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span><small>(13)</small></label>
        </div>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-2" name="review">
            <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span><small>(13)</small></label>
        </div>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-3" name="review">
            <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
        </div>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-4" name="review">
            <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(5)</small></label>
        </div>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-5" name="review">
            <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><small>(1)</small></label>
        </div>
    </figure>--}}
     {{--<figure>
        <h4 class="widget-title">By Color</h4>
       @foreach($colors as $color)

            <div class="ps-checkbox ps-checkbox--color  ps-checkbox--inline" style="background-color: {{$color->code}}; !important">
                <input class="form-control" type="checkbox" id="color-{{$color->slug}}" name="size">
                <label for="color-{{$color->slug}}"></label>
            </div>

            <div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline" style="background-color: {{$color->code}}; !important">
                <input class="form-control" type="checkbox" id="color-1" name="size">
                <label for="color-1"></label>
            </div>
        @endforeach

    </figure>--}}

    {{--<figure class="sizes">
        <h4 class="widget-title">BY SIZE</h4>
        <a href="#" onclick="return 0">L</a>
        <a href="#">M</a>
        <a href="#">S</a>
        <a href="#">XL</a>
    </figure>--}}

</aside>
