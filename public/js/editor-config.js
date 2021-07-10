

/*var lngSwitchers = document.getElementsByClassName('language-selector');

var arabic = lngSwitchers[0].getElementsByClassName('btn btn-primary')[1];
var french = lngSwitchers[0].getElementsByClassName('btn btn-primary')[0];
console.log(french,'***************',arabic);

var direction = false;
arabic.addEventListener("click", function(){

   direction = true;
   tinymce.remove();
   tinymce_setup_callback();
   console.log(direction);

});

french.addEventListener("click", function(){
  direction = false;
  tinymce.remove();
  tinymce_setup_callback();
  console.log(direction);
});*/
//var ok = document.querySelectorAll('#ar, #fr');
/*document.querySelectorAll('label.btn.btn-primary').forEach(item => {
  //console.log(item);
  item.addEventListener('click', event => {
    tinymce.remove();
    direction = !direction;
    tinymce_setup_callback();
    console.log(item,direction);
  })
})*/

function tinymce_setup_callback(editor) {
    tinymce.init({
      //rtl_ui: direction,
      menubar: false,
      selector: "textarea.richTextBox",
      skin_url:
        $('meta[name="assets-path"]').attr("content") + "?path=js/skins/voyager",
      min_height: 100,
      height: 500,
      resize: "vertical",
      plugins: "link, image, code, table, textcolor, lists",
      /*plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],*/
      extended_valid_elements:
        "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
      file_browser_callback: function (field_name, url, type, win) {
        if (type == "image") {
          $("#upload_file").trigger("click")
        }
      },
      toolbar:
        "ltr rtl | sizeselect | bold italic | fontselect |  fontsizeselect | styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code",
      convert_urls: false,
      image_caption: true,
      image_title: true,
      font_formats:
         "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica;Segoe UI=Segoe UI; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
      
      content_style:
         "body { font-family: Segoe UI; }",
    });
  }