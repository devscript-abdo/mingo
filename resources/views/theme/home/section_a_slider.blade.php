<div class="ps-home-banner ps-home-banner--1" dir="ltr">
    <div class="ps-container">
        <div class="ps-section__left">
            <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                @foreach ($sliders as $slider )
                    <div class="ps-banner bg--cover" data-background="{{$slider->photo}}">
                        <a class="ps-banner__overlay" href="{{$slider->link}}">{{--$slider->field('button_text')--}}</a>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="ps-section__right">

            @foreach ($topAds as $ad)
                <a class="ps-collection" href="{{$ad->url}}">
                    <img src="{{$ad->photo}}" alt="{{$ad->name}}">
                </a>
            @endforeach
         
        </div>
    </div>
</div>