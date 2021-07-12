
<div class="form-group">
    <label>{{$attribute->name}}</label> <br>
    @foreach ($attrs as $attr)
        <div class="form-check form-check-inline">
            <input type="radio" id="val{{$attr->id}}" name="attr" value="{{$attr->value}}" class="form-check-input">
            <label class="form-check-label" for="val{{$attr->id}}">{{$attr->value}}</label>
        </div>
    @endforeach

</div>