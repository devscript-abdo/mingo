
    <figure>
        <figcaption>{{$attribute->name}}</figcaption>
        <input  
        type="hidden"
        id="setAttributeData{{$attribute->name}}"
        name="attributes[{{$attribute->name}}]"
        wire:model.defer="attributesData.{{$attribute->name}}"
        value="rgg"
       
        >
        @foreach($attribute->values->whereIn('product_id',[$product->id]) as $value)
            <div data-name={{$attribute->name}} class="ps-variant ps-variant--size" id="{{$value->value}}"
            onclick="getAttributeData(this);"
            >
                <span class="ps-variant__tooltip" id="{{$value->product_id}}">{{$value->value}}</span>
                <span class="ps-variant__size">{{$value->value}}</span>
            </div>
        @endforeach
    </figure>