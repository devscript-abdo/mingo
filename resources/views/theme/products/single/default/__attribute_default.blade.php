
    <figure>
        <figcaption>{{$attribute->name}}</figcaption>
        @foreach($attribute->values->whereIn('product_id',[$product->id]) as $value)
            <div class="ps-variant ps-variant--size" id="sizeVariant"
            onclick="setSelected(this)"
            >
                <span class="ps-variant__tooltip" id="{{$value->product_id}}">{{$value->value}}</span>
                <span class="ps-variant__size">{{$value->value}}</span>
            </div>
        @endforeach
    </figure>