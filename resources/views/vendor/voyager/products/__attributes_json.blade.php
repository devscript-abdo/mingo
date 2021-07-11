<div class="col-lg-12">
    <label>Attributes (Size,...)</label>
    <br>

        @isset($attributesData)
            @foreach ($attributesData as $attr)
                   
                <div class="col-sm-6 col-md-12">
                    <label>{{$attr->name}}</label>
                    <select id="itemsData"  name="attributeData[{{$attr->name}}]" class="form-control" >
                        
                    @foreach ($attr->values as $val)
                        <option  value="{{$val->value}}">{{$val->value}}</option>
                    @endforeach
                    </select> 
                </div>

            @endforeach
        @endisset
    </table>
    <br>
  </div><!-- /.col-lg-6 -->

  <script>
      /*********** define Global variable to use it in customeJs file ***/
      window.deleteAttrRoute = "{{route('admin.attrs.delete')}}";
      window.csrfToken = "{{  csrf_token() }}";
  </script>