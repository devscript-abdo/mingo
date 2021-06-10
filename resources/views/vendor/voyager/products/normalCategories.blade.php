<ul style="list-style-type: none; padding-left: 0">
        @foreach ($allCategories as $category)
            @if($category->parent_id === null && count($category->childrens))
                <li>
                    <label>
                    <input value="{{ $category->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $category->id ? 'checked' : '' }}>
                    {{ $category->name }}
                    </label>
                    <ul>
                        @foreach ($category->childrens as $categoriee)
                            <li>
                                <label>
                                    <input value="{{ $categoriee->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $categoriee->id ? 'checked' : '' }}>
                                    {{ $categoriee->name }}
                                </label>
                                <ul>
                                    @foreach ($categoriee->childrens as $categorieee)
                                        <li>
                                            <label>
                                                <input value="{{ $categorieee->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $categorieee->id ? 'checked' : '' }}>
                                                {{ $categorieee->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @elseif($category->parent_id ===null && $category->childrens()->count()===0)
                <li class="menu-item">
                    <label>
                        <input value="{{ $category->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $category->id ? 'checked' : ''}}>
                        {{ $category->name }}
                    </label>
                </li>
            
            @endif
        @endforeach
</ul>