<div class="ps-contact-info">
    <div class="container">
        <div class="ps-section__header">
            <h3>{{__('contactPage.contact_title')}}</h3>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>{{__('contactPage.contact_email')}}</h4>
                        <p>
                            <a href="#">
                                <span>
                            </span>
                        </a><span>
                            {{setting('contacts.email') ??'mingo.ma'}}
                        </span>
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>{{__('contactPage.contact_address')}}</h4>
                        <p><span>{{setting('contacts.address') ??'mingo.ma'}}</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>{{__('contactPage.contact_phone')}}</h4>
                        <p><span>{{setting('contacts.tele') ??'mingo.ma'}}</span></p>
                    </div>
                </div>

                {{--<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>Work With Us</h4>
                        <p><span>Send your CV to our email:</span><a href="#"><span class="__cf_email__" data-cfemail="d0b3b1a2b5b5a290bdb1a2a4b6a5a2a9feb3bfbd">[email&#160;protected]</span></a></p>
                    </div>
                </div>--}}

            </div>
        </div>
    </div>
</div>