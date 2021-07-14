<script>

    const delay = ms => new Promise(res => setTimeout(res, ms));

    let slugs = @json($productsSimilaire);

    const tryTosetUrl = async (element) => 
     {
        element.innerHTML='<i class="fa fa-spinner fa-spin"></i>';
        await delay(3000);
        setUrlToLink(element);
     }

     function setUrlToLink(element)
     {
        

        //console.log(slugs);

        var item = slugs[Math.floor(Math.random()*slugs.length)];

        element.setAttribute('href',`/products/${item}`);

        window.location=`/products/${item}`;
            
     }

</script>