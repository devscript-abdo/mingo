<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" action="{{route('customer.loginPost')}}" method="post">
            @csrf
            <ul class="ps-tab-list">
                <li class="active"><a href="{{route('customer.login')}}">Login</a></li>
                <li><a href="{{route('customer.register')}}">Register</a></li>
            
            </ul>
            <div class="ps-tabs">
                <div class="ps-tab active" id="sign-in">
                    <div class="ps-form__content">
                        <h5>Log In Your Account</h5>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-forgot">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="ps-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Rememeber me</label>
                            </div>
                        </div>
                        <div class="form-group submtit">
                            <button type="submit"  class="ps-btn ps-btn--fullwidth">Login</button>
                        </div>
                    </div>
                    <div class="ps-form__footer">
                        <p>Connect with:</p>
                        <ul class="ps-list--social">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                           
                        </ul>
                    </div>
                </div>
              
            </div>
        </form>
    </div>
</div>