<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  " dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="ps-form__billing-info">
        <h3 class="ps-form__heading">{{__('checkoutPage.check_form_title')}}</h3>
            <div class="form-group">
                <label>{{__('checkoutPage.check_form_name')}}<sup>*</sup>
                </label>
                <div class="form-group__content">
                    @if(auth()->guard('customer')->check())
                        <input 
                            class="form-control @error('billing_name') is-invalid @enderror" 
                            type="text" 
                            name="billing_name"
                            value="{{auth()->user()->name}}"
                            readonly
                        >
                    @else
                        <input 
                            class="form-control @error('billing_name') is-invalid @enderror" 
                            type="text" 
                            name="billing_name"
                            value="{{old('billing_name')}}" 
                        >
                    @endif
                    @error('billing_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>{{__('checkoutPage.check_form_email')}}<sup>*</sup>
                </label>
                <div class="form-group__content">
                    @if(auth()->guard('customer')->check())
                    <input 
                        class="form-control @error('billing_email') is-invalid @enderror" 
                        type="email" 
                        name="billing_email"
                        value="{{auth()->user()->email}}"
                        readonly  
                    >
                    @else
                    <input 
                        class="form-control @error('billing_email') is-invalid @enderror" 
                        type="email" 
                        name="billing_email"
                        value="{{old('billing_email')}}"  
                    >
                    @endif
                    @error('billing_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>{{__('checkoutPage.check_form_ville')}}<sup>*</sup>
                </label>
                <div class="form-group__content">
                    @if(auth()->guard('customer')->check())
                    <input 
                        class="form-control @error('billing_city') is-invalid @enderror" 
                        type="text" 
                        name="billing_city"
                        value="{{auth()->user()->city}}" 
                     >
                     @else
                     <input 
                        class="form-control @error('billing_city') is-invalid @enderror" 
                        type="text" 
                        name="billing_city"
                        value="{{old('billing_city')}}" 
                    >
                     @endif
                    @error('billing_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if(auth()->guard('customer')->check() && count(auth()->guard('customer')->user()->addresses))
               
                    <div class="form-group">
                            <label>{{__('checkoutPage.check_form_addresses')}}</label>
                            <select class="form-control" name="billing_address">
                                @forelse (auth()->user()->addresses as $address)
                                 <option value="{{$address->addresse}}">{{$address->addresse}}</option>
                                @empty
                        
                                @endforelse
                        
                            </select>
                    </div>
            @else
                <div class="form-group">
                    <label>{{__('checkoutPage.check_form_address')}}<sup>*</sup>
                    </label>
                    <div class="form-group__content">
                        <input 
                            class="form-control @error('billing_address') is-invalid @enderror" 
                            type="text" 
                            name="billing_address"
                            value="
                               {{
                                auth()->guard('customer')->check()
                                    ?
                                auth()->guard('customer')->user()->addresse
                                    : 
                                old('billing_address')
                               }}"  
                        >
                        @error('billing_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @endif
   
            <div class="form-group">
                <label>{{__('checkoutPage.check_form_tele')}}<sup>*</sup>
                </label>
                <div class="form-group__content">
                    <input 
                        class="form-control @error('billing_phone') is-invalid @enderror" 
                        type="text" 
                        name="billing_phone" 
                        value="{{auth()->guard('customer')->check() ? auth()->guard('customer')->user()->phone : old('billing_phone')}}"   
                    >
                    @error('billing_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="create-account">
                    <label for="create-account">
                        {{__('checkoutPage.check_creat_account')}}
                    </label>
                </div>
            </div>
            <h3 class="mt-40"> {{__('checkoutPage.check_form_order')}}</h3>
            <div class="form-group">
                <label>{{__('checkoutPage.check_form_order')}}</label>
                <div class="form-group__content">
                    <textarea 
                        name="billing_notes"
                        class="form-control @error('billing_notes') is-invalid @enderror" 
                        rows="7" 
                        placeholder="Notes about your order, e.g. special notes for delivery."
                     >
                    {{old('billing_notes')}}
                    </textarea>
                    @error('billing_notes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
     
    </div>
</div>