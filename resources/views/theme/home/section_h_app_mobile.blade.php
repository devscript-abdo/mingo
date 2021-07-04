<div class="ps-download-app">
    <div class="ps-container">
        <div class="ps-block--download-app">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block__thumbnail"><img src="{{Voyager::image(setting('home-page.app_mobile_image'))}}" alt="Mingo.ma"></div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block__content">
                            <h3>{{__('homePage.app_mobile_title')}}</h3>
                            <p>{{__('homePage.app_mobile_desciption')}}</p>
                            {{--<form class="ps-form--download-app" action="" method="post">
                                <div class="form-group--nest">
                                    <input class="form-control" type="Email" placeholder="Email Address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </form>--}}
                            <p class="download-link">
                                <a href="{{setting('home-page.app_mobile_url_google_play') ?? '#'}}">
                                    <img src="assets/img/google-play.png" alt="Mingo.ma">
                                </a>
                                <a href="{{setting('home-page.app_mobile_url_app_store') ?? '#'}}">
                                    <img src="assets/img/app-store.png" alt="Mingo.ma">
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>