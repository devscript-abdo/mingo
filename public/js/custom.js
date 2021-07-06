
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="attrs['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="attrs['+i+'][quantity]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="attrs['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Supprimer</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
