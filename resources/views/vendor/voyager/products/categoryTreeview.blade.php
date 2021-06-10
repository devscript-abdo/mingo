@foreach($allCategories as $category)
 
        <label>
            <input value="{{ $category->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $category->id ? 'checked' : '' }}>
            {{ $category->name }}
        </label>

  @if(count($category->subcategory))
    @include('vendor.voyager.products.subCategoryList',['subcategories' => $category->subcategory])
  @endif

@endforeach
