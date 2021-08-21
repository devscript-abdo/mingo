<nav class="navigation">
    <div class="container" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
        <ul class="menu menu--market-2">
            <li><a href="{{route('products')}}">{{__('navbar.shop')}}</a>
            </li>
            @if($categoriesMenu)

                @foreach ( $categoriesMenu as $category)
                    <li>
                        <a href="{{$category->url}}">{{$category->field('name')}}</a>
                    </li>
                @endforeach

            @endif
            <li>
                <a href="{{route('products.explore')}}">{{__('navbar.explore')}}</a>
            </li>
        </ul>
    </div>
</nav>