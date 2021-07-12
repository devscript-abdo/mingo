@if($product->attributes->count())
@foreach($product->attributes as $attribute)

    @php
            $attrs = $attribute->values->whereIn('product_id',[$product->id]);
    @endphp
 
    @if($attribute->frontend_type === 'select')
       @include('theme.products.single.default.__attribute_select',['attrs'=>$attrs])
    @endif

    @if($attribute->frontend_type === 'radio')
       @include('theme.products.single.default.__attribute_radio',['attrs'=>$attrs])
    @endif

    @if($attribute->frontend_type === 'default')
       @include('theme.products.single.default.__attribute_default',['attrs'=>$attrs])
    @endif

@endforeach
@endif