<div class="col-lg-12">
    <label>Attributes</label>
    <br>
    <table class="table table-bordered" id="dynamicTable">
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <tr>

            <td><input type="text" name="attrs[0][name]" placeholder="Enter your Name" class="form-control" /></td>
            <td><input type="text" name="attrs[0][quantity]" placeholder="Enter your Qty" class="form-control" /></td>
            <td><input type="text" name="attrs[0][price]" placeholder="Enter your Price" class="form-control" /></td>

            <td><button type="button" name="add" id="add" class="btn btn-success">Ajouter</button></td>
        </tr>
        @isset($attrs)
            
            @foreach ($attrs as $attr)
                <tr>

                    <td><input type="text" name="attrsof[{{$attr->id}}][name]" value="{{$attr->name}}" class="form-control" /></td>
                    <td><input type="text" name="attrsof[{{$attr->id}}][quantity]" value="{{$attr->quantity}}" class="form-control" /></td>
                    <td><input type="text" name="attrsof[{{$attr->id}}][price]" value="{{$attr->price}}" class="form-control" /></td>

                    <td><button data-attrid="{{$attr->id}}" type="button" class="btn btn-danger remove-tr deleteAttr">supprimer</button></td>
                </tr>
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