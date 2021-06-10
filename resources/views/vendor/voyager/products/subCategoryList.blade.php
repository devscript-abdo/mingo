@foreach($subcategories as $subcategory)
 <ul>
    <li>
        <label>
            <input value="{{ $subcategory->id }}" type="radio" name="category_id" style="margin-right: 5px;" {{$categoriesForProduct == $subcategory->id ? 'checked' : '' }}>
            {{ $subcategory->name }}
        </label>
    </li> 
  @if(count($subcategory->subcategory))
    @include('vendor.voyager.products.subCategoryList',['subcategories' => $subcategory->subcategory])
  @endif
 </ul> 
@endforeach
