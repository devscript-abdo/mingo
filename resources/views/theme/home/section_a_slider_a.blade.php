<div class="ps-home-banner">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
        @foreach ($sliders as $slider )
            <div class="ps-banner--furniture" data-background="{{$slider->photo}}"><img src="{{$slider->photo}}" alt="">
                <div class="ps-banner__content">
                    <h4>Limit Edition</h4>
                    <h3>SCADINAVIA <br/> COLLECTIONS FOR YOUR <br/> BEDROOM JUST <strong> 40%</strong></h3>
                    <a class="ps-btn" href="{{$slider->link}}">Shop Now</a>
                </div>
            </div>
       @endforeach
    </div>
</div>