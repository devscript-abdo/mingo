<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>{{__('navbar.all_categories')}}</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li><a href="#">Hot Promotions</a>
            </li>
            @foreach($categories as $categorie)
                @if($categorie->parent_id === null && count($categorie->childrens))
                <li class="menu-item-has-children has-mega-menu">
                    <a href="{{$categorie->url}}">
                    <i class="{{$categorie->icon}}"></i> {{$categorie->field('name')}}
                    </a>
                    <span class="sub-toggle"></span>
                    <div class="mega-menu">
                
                        <div class="mega-menu__column">

                            <h4>{{$categorie->field('name')}}<span class="sub-toggle"></span></h4>

                            <ul class="mega-menu__list">
                                @foreach ($categorie->childrens as $categoriee)
                                <li><a href="{{$categoriee->url}}">{{$categoriee->field('name')}}</a></li>
                                @endforeach
                        
                            </ul>

                        </div>

                    </div>
                </li>

                {{--@elseif($categorie->parent_id ===null && $categorie->childrens()->count()===0)--}}
                @elseif($categorie->parent_id === null)
                <li>
                    <a href="{{$categorie->url}}">
                        <i class="{{$categorie->icon}}"></i> 
                        {{$categorie->field('name')}}
                    </a>
                </li>   
                @endif
            @endforeach
        </ul>
    </div>
</div>