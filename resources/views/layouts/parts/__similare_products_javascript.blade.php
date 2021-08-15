<script>

    const delay = ms => new Promise(res => setTimeout(res, ms));

    let slugs = @json($productsSimilaire);
    //console.log(slugs);
    const tryTosetUrl = async (element) => 
     {
        element.innerHTML='<i class="fa fa-spinner fa-spin"></i>';
        await delay(5000);
        setUrlToLink(element);
     }

     function setUrlToLink(element)
     {
        

        //console.log(slugs);

        var item = slugs[Math.floor(Math.random()*slugs.length)];

        element.setAttribute('href',`${item}`);

        window.location=`${item}`;
            
     }
  /// Elmarzougui Abdelghafour 
</script>