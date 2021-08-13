
<div class="menu--product-categories">
    <div class="menu__toggle"><i class="icon-menu"></i><span>{{__('navbar.all_categories')}}</span></div>
    <div class="menu__content">
        <ul class="menu--dropdown">
            <li><a href="#"><i class="icon-star"></i> Hot Promotions</a>
            </li>
            
            @foreach($categories as $categorie)
                @if(count($categorie->nestedChilds))

                <li class="menu-item-has-children has-mega-menu">
                    <a href="{{$categorie->url}}">
                      <i class="{{$categorie->icon ??'icon-star'}}"></i> {{$categorie->field('name')}}
                    </a>
                    <div class="mega-menu">
                   
                        <div class="mega-menu__column">

                            <h4>{{$categorie->field('name')}}<span class="sub-toggle"></span></h4>

                            <ul class="mega-menu__list">
                                @foreach ($categorie->nestedChilds as $categoriee)
                                  <li><a href="{{$categoriee->url}}">{{$categoriee->field('name')}}</a></li>
                                @endforeach
                         
                            </ul>

                        </div>

                    </div>
                </li>
                @else
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