<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li>
                <a href="{{route('home')}}">{{__('navbar.home')}}</a>
        
            </li>
            <li>
                <a href="{{route('products')}}">{{__('navbar.shop')}}</a>
        
            </li>

            @if($categoriesMenu)

                @foreach ( $categoriesMenu as $category)
                    <li>
                        <a href="{{$category->url}}">{{$category->field('name')}}</a>
                    </li>
                @endforeach

            @endif

            <li>
                <a href="{{route('about')}}">{{__('navbar.about')}}</a>
        
            </li>
            <li>
                <a href="{{route('contact')}}">{{__('navbar.contact')}}</a>
        
            </li>
        </ul>
    </div>
</div>