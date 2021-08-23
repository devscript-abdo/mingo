<div class="ps-home-ads">
    <div class="ps-container">
        <div class="row">
            @foreach($ads['bottom_home'] as $add)
            <div 
                @if($loop->first)
                 class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12"
                @else
                 class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "
                @endif
            >
                <a class="ps-collection" href="{{$add->url}}">
                    <img src="{{$add->photo}}" alt="{{$add->name}}">
                </a>
            </div>
            @endforeach
            {{--<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                <a class="ps-collection" href="#">
                    <img src="assets/img/collection/home-1/ad-2.jpg" alt="">
                </a>
            </div>--}}
        </div>
    </div>
</div>