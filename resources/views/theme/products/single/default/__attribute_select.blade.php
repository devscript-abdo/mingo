<div class="form-group">

    <label>{{$attribute->name}}</label>

    <select class="form-control" name="billing_address">

        @foreach ($attrs as $attr)

         <option value="{{$attr->value}}">{{$attr->value}}</option>

        @endforeach

    </select>
</div>