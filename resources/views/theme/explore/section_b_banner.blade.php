<div class="ps-shop-banner">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        @foreach ($topAds as $ad)
            <a href="{{$ad->url}}">
                <img src="{{$ad->photo}}" alt="{{$ad->name}}">
            </a>
        @endforeach
    </div>
</div>