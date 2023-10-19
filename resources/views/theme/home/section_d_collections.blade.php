<div class="ps-home-ads">
    <div class="ps-container">
        <div class="row">
            @isset($ads['center_home'])
                @foreach ($ads['center_home'] as $ad)
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                        <a class="ps-collection" href="{{ $ad->url }}">
                            <img src="{{ $ad->photo }}" alt="{{ $ad->name }}">
                        </a>
                    </div>
                @endforeach
            @endisset

        </div>
    </div>
</div>
