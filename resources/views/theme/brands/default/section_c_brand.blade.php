<div class="ps-shop-brand">
    @foreach($brands as $brand)
        <a href="{{$brand->website ?? '#'}}">
           <img src="{{$brand->photo}}" alt="{{$brand->name}}">
        </a>
    @endforeach

</div>
