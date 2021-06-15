<div class="ps-my-account">
    <div class="container">
        <form class="ps-form--account ps-tab-root" action="{{route('customer.registerPost')}}" method="post">
            @csrf
            <ul class="ps-tab-list">
                
                <li><a href="{{route('customer.login')}}">Login</a></li>
                <li class="active"><a href="{{route('customer.register')}}">Register</a></li>
            </ul>
            <div class="ps-tabs">
                <div class="ps-tab active" id="register">
                    <div class="ps-form__content">
                        <h5>Register An Account</h5>
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                           
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                           
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password">

                        </div>
                        <div class="form-group submtit">
                            <button type="submit" class="ps-btn ps-btn--fullwidth">register</button>
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