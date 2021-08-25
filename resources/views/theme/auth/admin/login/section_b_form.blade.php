<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" action="{{route('admin.loginPost')}}" method="post">
            @csrf
            @honeypot
            <div class="ps-tabs">
                <div class="ps-tab active" id="sign-in">
                    <div class="ps-form__content">
      
                        <h5>{{__('login.login_title')}}</h5>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{__('login.form_email')}}" required autocomplete="off" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-forgot">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('login.form_password')}}" required autocomplete="off">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                            @if (Route::has('customer.forgotpassword'))
                                <a  href="{{ route('customer.forgotpassword') }}">
                                    <strong>{{__('login.form_forgot_pass')}}</strong>
                                </a>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="ps-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">{{__('login.form_remember')}}</label>
                            </div>
                        </div>
                        <div class="form-group submtit">
                            <button type="submit"  class="ps-btn ps-btn--fullwidth">
                                {{__('login.form_login_button')}}
                            </button>
                        </div>
                    </div>
     
                    <div class="ps-form__footer">

                        <a href="{{route('admin.register')}}"  class="ps-btn ps-btn--fullwidth mb-2">
                            {{__('login.form_create_account')}}
                         </a>
                        
                    </div>
                </div>
              
            </div>
        </form>
    </div>
</div>