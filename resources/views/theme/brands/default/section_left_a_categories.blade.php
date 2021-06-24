<aside class="widget widget_shop">
    <h4 class="widget-title">Brands</h4>
    <ul class="ps-list--categories">
        @foreach($brands as $brand)

            <li>
                <a href="{{$brand->url}}">{{$brand->name}}</a>
            </li> 
        @endforeach
    </ul>
</aside>