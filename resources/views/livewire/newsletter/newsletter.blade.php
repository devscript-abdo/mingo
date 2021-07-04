<div>
    <div class="ps-newsletter" dir="ltr">
        <div class="ps-container">
            <form wire:submit.prevent="addToNewsLetter()" class="ps-form--newsletter" action="" method="post">
                @csrf
                @honeypot
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>{{__('footer.newsletter')}}</h3>
                            <p>{{__('footer.newsletter_detail')}}</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input 
                                    wire:model.defer="email" 
                                    class="form-control" 
                                    type="email" 
                                    placeholder="{{__('footer.newsletter_detail_email')}}"
                                    required
                                >
                                <button class="ps-btn">{{__('footer.newsletter')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
