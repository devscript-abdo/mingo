
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="attrs['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="attrs['+i+'][quantity]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="attrs['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Supprimer</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

    /******************************************************* */
    /******************************************************* */
    /******************************************************* */
    //console.log(deleteAttrRoute,csrfToken);
    $(".deleteAttr").click(function (e) {
        e.preventDefault()

        var ele = $(this);
        //console.log(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: deleteAttrRoute,
                method: "DELETE",
                data: {_token: csrfToken , id: ele.attr("data-attrid")},
                success: function (response) {
                    console.log(response);
                   // window.location.reload();
                }
            });
        }
    });

var id = 0;
function getAttributes(select) 
{
 // alert(select.options[select.selectedIndex].text);
  id = select.options[select.selectedIndex].id;
  var attrsValue = document.getElementById('attrs-value');
  attrsValue.setAttribute('name',`attrset[${id}][value]`);

  var attrsQte = document.getElementById('attrs-quantity');
  attrsQte.setAttribute('name',`attrset[${id}][quantity]`);

  var attrsPrice = document.getElementById('attrs-price');
  attrsPrice.setAttribute('name',`attrset[${id}][price]`);
}
