<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" action="{{route('verification.send')}}" method="post">
            @csrf
            @honeypot
            <div class="ps-tabs">
                <div class="ps-tab active" id="register">
                    <div class="ps-form__content mt-5">
                        <h5>You must Verify Your Email</h5>
                        <p>{{session('message') ?? ''}}</p>
                        <div class="form-group submtit ">
                            <button type="submit" class="ps-btn ps-btn--fullwidth">
                                send Verification link
                            </button>
                        </div>
                    </div >
       
                </div>
            </div>
        </form>
    </div>
</div>