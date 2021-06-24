<script type="text/javascript">

    /*window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loadedMailletex';
        window.location.reload();
    }
}*/
  
    $(".deleteProductFromCart").click(function (e) {
        e.preventDefault()
        console.log('OoOoO');
       
        var ele = $(this);
        //console.log(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{route('shoppingcart.delete')}}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-prodid")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>


<script type="text/javascript">
    $(".deleteCouponFromCart").click(function (e) {
        e.preventDefault()
        var ele = $(this);
        //console.log(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{route('coupon.delete')}}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}'},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>

<script>
  
    $(document).ready(function() {$('.singleProductsColors').select2();});
       

</script>

<script>

    
    let clicked = true;
    function setSelected(e) {
        
        if(clicked)
        {
            e.style.background='#000000';

        }
        else{

            e.style.background='#fff'; 
        }
        
        clicked = !clicked;
    }   

</script>