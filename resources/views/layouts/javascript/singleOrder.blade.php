

<script>

    let status = document.querySelectorAll('.dropdown-menu a');
    status.forEach(myFunction);
    function myFunction(item) {
      console.log(item.getAttribute("href").replace('#',''));
     return item.getAttribute("href").replace('#','');
    }
</script>