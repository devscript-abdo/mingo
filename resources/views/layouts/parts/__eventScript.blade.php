
<script>
    var openCartButton = document.getElementById('cart-mobile');
    //console.log(openCartButton);
    window.addEventListener('added_to_cart', event => {
     
        toastr[event.detail.type](event.detail.message)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "rtl": true, 

        }
        if (event.detail.type === 'success') {
            openCartButton.classList.add("active");
            setTimeout(function () {
               
                //window.location.assign("{{route('shoppingcart')}}")
                openCartButton.classList.remove("active");
            }, 4000);

        }
    })

    /*window.addEventListener('added_to_cart', event => {

        swal({
            position: 'top-end',
            title : event.detail.message,
            text : event.detail.message,
            icon : event.detail.type,
           // buttons : true,
            //showConfirmButton: false,
            timer: 1500
        });
        if (event.detail.type === 'success') {

            setTimeout(function () {
                location.reload();
            }, 1000);

        }
        .then((willDelete)=>{
            if(willDelete){
                window.livewire.emit('deleteLead',event.detail.id);
            }
        });
    });*/
</script>

<script>
    /*var addToCart = document.getElementsByClassName('addToCartDeals');
    addToCart.addEventListener('click', function() {
        console.log('Ouiiii');
    });*/

    function showCartByTime()
    {
        var openCartButton = document.getElementById('cart-mobile');
        var status = false; 
        const intervala = setInterval(function () {
            status = true;
            console.log(status);  
            }, 3000);
     
        clearInterval(intervala); // thanks @Luca D'Amico

        const interval = setInterval(function () {
                if(status){
                    openCartButton.classList.add("active");
                    console.log('Ouii');
                }else{
                    openCartButton.classList.remove("active");
                    console.log('Ouii false');
                }

               
            }, 8000);
            clearInterval(interval); // thanks @Luca D'Amico
    }

    showCartByTime();

    /*Livewire.on('add_toCartFromHome', postId => {
      alert('A post was added with the id of: ' + postId);
     })*/
</script>



