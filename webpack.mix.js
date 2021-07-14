const mix = require('laravel-mix');

 /*
  |--------------------------------------------------------------------------
  | Mix Asset Management
  |--------------------------------------------------------------------------
  |
  | Mix provides a clean, fluent API for defining some Webpack build steps
  | for your Laravel applications. By default, we are compiling the CSS
  | file for the application as well as bundling up all the JS files.
  |
  */
 
 mix.styles(
     [
         "public/assets/plugins/font-awesome/css/font-awesome.min.css",
         "public/assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css",
         "public/assets/plugins/bootstrap/css/bootstrap.min.css",
         "public/assets/plugins/owl-carousel/assets/owl.carousel.min.css",
         "public/assets/plugins/owl-carousel/assets/owl.theme.default.min.css",
         "public/assets/plugins/slick/slick/slick.css",
         "public/assets/plugins/lightGallery-master/dist/css/lightgallery.min.css",
         "public/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css",
 
         "public/assets/css/style.css"
     ],
     "public/assets/css/app.css"
 )
 .styles(
    [
        "public/assets/plugins/font-awesome/css/font-awesome.min.css",
        "public/assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css",
        "public/assets/plugins/bootstrap/css/bootstrap.min.css",
        "public/assets/plugins/owl-carousel/assets/owl.carousel.min.css",
        "public/assets/plugins/owl-carousel/assets/owl.theme.default.min.css",
        "public/assets/plugins/slick/slick/slick.css",
        "public/assets/plugins/lightGallery-master/dist/css/lightgallery.min.css",
        "public/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css",

        "public/assets/css/rtl.css"
    ],
    "public/assets/css/app_rtl.css"
)
 .scripts(
     [
        "public/assets/plugins/jquery.min.js",
        "public/assets/plugins/popper.min.js",
        "public/assets/plugins/owl-carousel/owl.carousel.min.js",
        "public/assets/plugins/bootstrap/js/bootstrap.min.js",
        "public/assets/plugins/slick/slick/slick.min.js",
        "public/assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js",
        "public/assets/plugins/slick-animation.min.js",
        "public/assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js",
    
        "public/assets/js/main.js",
     ],
     "public/assets/js/app.js"
 );
 
 if (mix.inProduction()) {
     mix.version();
 }
