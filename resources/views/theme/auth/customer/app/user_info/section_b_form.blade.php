<div class="col-lg-8">
    <div class="ps-section__right">
        <form  class="ps-form--account-setting" action="{{route('customer.profilUpdate')}}" method="post">
            <div class="ps-form__header">
                <h3> {{__('customer.customer_info_title')}}</h3>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <p>{{session()->get('message')}}</p>
                    </div>
                @endif
            </div>
            @csrf
            <div class="ps-form__content">
                <div class="form-group">
                    <label>{{__('customer.customer_form_name')}}</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{auth()->user()->name}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_tele')}}</label>
                            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" @if(auth()->user()->phone)
                                    value="{{auth()->user()->phone}}"
                                    @else
                                    placeholder="{{__('customer.customer_form_name')}}"
                                    @endif
                            >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_email')}}</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{auth()->user()->email}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_ville')}}</label>
                            <input class="form-control @error('city') is-invalid @enderror" name="city" type="text" value="{{auth()->user()->city}}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_address')}}</label>
                            <input class="form-control @error('addresse') is-invalid @enderror" name="addresse" type="text" value="{{auth()->user()->addresse}}">
                            @error('addresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!---------------------------------------------------------->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_old_pass')}}</label>
                            <input class="form-control @error('oldpassword') is-invalid @enderror" 
                                name="oldpassword" type="text"
                                value="{{ old('oldpassword') }}"
                                placeholder="{{__('customer.customer_form_old_pass')}}"      
                            >
                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_new_pass')}}</label>
                            <input class="form-control @error('new_password') is-invalid @enderror" 
                                name="new_password" type="text"
                                value="{{ old('new_password') }}"
                                placeholder="{{__('customer.customer_form_new_pass')}}"
                             >
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>{{__('customer.customer_form_new_pass_confirm')}}</label>
                            <input class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" type="text"
                             placeholder="{{__('customer.customer_form_new_pass_confirm')}}"
                             >
                            @error('new_confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{--<div class="col-sm-6">
                        <div class="form-group">
                            <label>Birthday</label>
                            <input class="form-control" type="text" placeholder="Please enter your birthday...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="form-group submit">
                <button type="submit" class="ps-btn">{{__('customer.customer_form_update')}}</button>
            </div>
        </form>
    </div>
</div>