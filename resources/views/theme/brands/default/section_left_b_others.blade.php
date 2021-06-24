<aside class="widget widget_shop">

    <figure>
        <h4 class="widget-title">Prix</h4>
        <div id="nonlinear"></div>
        <p class="ps-slider__meta">Prix:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>
    </figure>

    {{--<figure>
        <h4 class="widget-title">Prix</h4>
        <div class="ps-checkbox">
            <input class="form-control" type="checkbox" id="review-1" name="review">
            <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span><small>(13)</small></label>
        </div>
      
    </figure>--}}

    <figure>
        <h4 class="widget-title">By Color</h4>
        @foreach($colors as $color)
        
            <div class="ps-checkbox ps-checkbox--color  ps-checkbox--inline" style="background-color: {{$color->code}}; !important">
                <input 
                class="form-control" 
                type="checkbox" 
                id="color-{{$color->slug}}" 
                name="size"
                onclick="filterColor('{{$color->slug}}');this.classList.add('selected')"
                >
                <label for="color-{{$color->slug}}"></label>
            </div>

            {{--<div class="ps-checkbox ps-checkbox--color color-1 ps-checkbox--inline" style="background-color: {{$color->code}}; !important">
                <input class="form-control" type="checkbox" id="color-1" name="size">
                <label for="color-1"></label>
            </div>--}}
        @endforeach
     
    </figure>
    <figure class="sizes">
        <h4 class="widget-title">BY SIZE</h4><a href="#">L</a><a href="#">M</a><a href="#">S</a><a href="#">XL</a>
    </figure>
</aside>