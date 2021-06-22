<div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
    <div class="ps-form__billing-info">
        <h3 class="ps-form__heading">Billing Details</h3>
            <div class="form-group">
                <label>Nom Complet<sup>*</sup>
                </label>
                <div class="form-group__content">
                    @if(auth()->check())
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
                <label>Email Address<sup>*</sup>
                </label>
                <div class="form-group__content">
                    @if(auth()->check())
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
                <label>Ville<sup>*</sup>
                </label>
                <div class="form-group__content">
                    <input 
                        class="form-control @error('billing_city') is-invalid @enderror" 
                        type="text" 
                        name="billing_city"
                        value="{{old('billing_city')}}" 
                     >
                    @error('billing_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @guest
                
            
                <div class="form-group">
                    <label>Address<sup>*</sup>
                    </label>
                    <div class="form-group__content">
                        <input 
                            class="form-control @error('billing_address') is-invalid @enderror" 
                            type="text" 
                            name="billing_address"
                            value="{{old('billing_address')}}"  
                        >
                        @error('billing_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @endguest
            @auth('customer')
                <div class="form-group">
                        <label>addresses</label>
                        <select class="form-control" name="billing_address">
                            <option value="">selectionner une address</option>
                            @forelse (auth()->user()->addresses as $address)
                            <option value="{{$address->addresse}}">{{$address->addresse}}</option>
                            @empty
                      
                            @endforelse
                      
                        </select>
                </div>
            @endauth
   
            <div class="form-group">
                <label>Télé<sup>*</sup>
                </label>
                <div class="form-group__content">
                    <input 
                        class="form-control @error('billing_phone') is-invalid @enderror" 
                        type="text" 
                        name="billing_phone" 
                        value="{{old('billing_phone')}}"
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
                    <label for="create-account">Create an account?</label>
                </div>
            </div>
            <div class="form-group">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="cb01">
                    <label for="cb01">Ship to a different address?</label>
                </div>
            </div>
            <h3 class="mt-40"> Addition information</h3>
            <div class="form-group">
                <label>Order Notes</label>
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