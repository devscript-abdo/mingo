
<div class="form-group">
    <label>{{$attribute->name}}</label> <br>
    <input  
        type="hidden"
        id="setAttributeData{{$attribute->name}}"
        name="attributes[{{$attribute->name}}]"
        wire:model.defer="attributesData.{{$attribute->name}}"
        value="rgg"
    >
    @foreach ($attrs as $attr)
        <div class="form-check form-check-inline">
            <input 
            type="radio"
                id="{{$attr->value}}"
                name="{{$attribute->name}}"
                value="{{$attr->value}}"
                class="form-check-input"
                data-name={{$attribute->name}}
                onclick="getAttributeData(this);"
            >
            <label class="form-check-label" for="{{$attr->value}}">{{$attr->value}}</label>
        </div>
    @endforeach

</div>