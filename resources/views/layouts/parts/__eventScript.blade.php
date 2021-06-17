
<script>
    window.addEventListener('added_to_cart', event => {

        toastr[event.detail.type](event.detail.message)
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "rtl": true, 

        }
        if (event.detail.type === 'success') {

            setTimeout(function () {
                location.reload();
            }, 1000);

        }
    })
</script>


