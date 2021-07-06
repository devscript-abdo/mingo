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
        @foreach($allAttributes as $attr)
        <tr>
           
            <td><input type="text" name="attribute[{{$attr->id}}][{{$attr->name}}]" placeholder="Enter your {{$attr->name}}" class="form-control" /></td>
            <td><input type="text" name="attribute[{{$attr->id}}][{{$attr->name}}]" placeholder="Enter your {{$attr->name}}" class="form-control" /></td>
            <td><input type="text" name="attribute[{{$attr->id}}][{{$attr->name}}]" placeholder="Enter your {{$attr->name}}" class="form-control" /></td>
           
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
        </tr>
        @endforeach
    </table>
    <br>
  </div><!-- /.col-lg-6 -->