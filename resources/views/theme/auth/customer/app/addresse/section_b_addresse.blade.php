<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>{{__('customer.customer_address')}}</h3>
            </div>
            <div class="ps-section__content">
                <div class="row">

                    @foreach($addresses as $addresse)
                        <div class="col-md-6 col-12 mt-10 mb-20">
                            <figure class="ps-block--address">
                                <figcaption>{{$addresse->city}}</figcaption>
                                <div class="ps-block__content">
                                    <p>{{$addresse->addresse}}</p>
                                    <a 
                                        href="#"
                                        onclick="document.getElementById('deleteAddress').submit();"
                                        style="color:red !important"
                                    >
                                     {{__('customer.customer_address_delete')}} 
                                     <i class="icon-trash"></i>
                                    </a>
                                    <form action="{{route('customer.addresses.delete')}}" method="post" hidden id="deleteAddress">
                                        @csrf
                                        @honeypot
                                        <input type="hidden" name="addresse" value="{{$addresse->id}}">
                                        @method('DELETE')
                                    </form>
                                </div>
                            </figure>
                        </div>
                    @endforeach

                </div>
            </div>
            <form class="ps-form--account-setting" action="{{route('customer.addresses.store')}}" method="post">
                <div class="ps-form__header">
                    <h3>{{__('customer.customer_address_add')}}</h3>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <p>{{session()->get('message')}}</p>
                        </div>
                    @endif
                </div>
                @csrf
                <div class="ps-form__content">
                    <div class="form-group">
                        <label>{{__('customer.customer_address_form_name')}} </label>
                        <input 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            type="text" 
                            value="{{auth()->guard('customer')->user()->name}}"
                        >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('customer.customer_address_form_email')}}</label>
                                <input 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                type="email"
                                value="{{auth()->guard('customer')->user()->email}}"

                                >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('customer.customer_address_form_tele')}}</label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" value="">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('customer.customer_address_form_ville')}}</label>
                                <input class="form-control @error('city') is-invalid @enderror" name="city" type="text" value="">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('customer.customer_address_form_address')}}</label>
                                <input class="form-control @error('addresse') is-invalid @enderror" name="addresse" type="text" value="">
                                @error('addresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <!---------------------------------------------------------->
                    </div>
                </div>
                <div class="form-group submit">
                    <button type="submit" class="ps-btn">{{__('customer.customer_address_form_add')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>