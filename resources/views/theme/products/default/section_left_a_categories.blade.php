<aside class="widget widget_shop">
    <h4 class="widget-title">Categories</h4>
    <ul class="ps-list--categories">
        @foreach($categories as $categorie)
            @if($categorie->parent_id === null && count($categorie->childrens))
                <li class="menu-item-has-children">
                    <a href="{{$categorie->url}}">{{$categorie->field('name')}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        @foreach ($categorie->childrens as $categoriee)
                          
                           @if(count($categoriee->childrens))
                            
                                <li class="menu-item-has-children"><a href="{{$categoriee->url}}">{{$categoriee->field('name')}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">
                                        @foreach ($categoriee->childrens as $categorieee)
                                            <li><a href="{{$categorieee->url}}">{{$categorieee->field('name')}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                           @else

                           <li><a href="{{$categoriee->url}}">{{$categoriee->field('name')}}</a></li>     
                                
                           @endif

                         @endforeach
                        </li>
                    </ul>
                </li>

            @elseif($categorie->parent_id ===null && $categorie->childrens()->count()===0)
    
                <li><a href="{{$categorie->url}}">{{$categorie->field('name')}}</a>
                </li> 

            @endif
          
        @endforeach
    </ul>
</aside>