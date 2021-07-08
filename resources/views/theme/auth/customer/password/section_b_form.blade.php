<div class="ps-my-account">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="ps-form--account ps-tab-root" action="{{ route('customer.forgotpasswordPost') }}" method="post">
            @csrf
            @honeypot
            <div class="ps-tabs">
                <div class="ps-tab active" id="sign-in">
                    <div class="ps-form__content">
      
                        <h5>{{ __('Reset Password') }}</h5>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{__('login.form_email')}}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group submtit">
                            <button type="submit"  class="ps-btn ps-btn--fullwidth">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
     
                    <div class="ps-form__footer">

                    </div>
                </div>
              
            </div>
        </form>
    </div>
</div>