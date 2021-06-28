<div>
    <div class="ps-contact-form">
        <div class="container">
            <form 
                wire:submit.prevent="sendEmail()"
                class="ps-form--contact-us" 
                action="{{route('contactPost')}}" 
                method="post"
            >
                @csrf
                @honeypot
                <h3>Get In Touch</h3>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                        <div class="form-group">
                            <input wire:model.defer="data.name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Name *" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                        <div class="form-group">
                            <input wire:model.defer="data.email" class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email ">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <div class="form-group">
                            <input wire:model.defer="data.telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" type="text" placeholder="telephone *" required>
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input wire:model.defer="data.subject" class="form-control @error('subject') is-invalid @enderror" name="subject" type="text" placeholder="Subject *" required>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <textarea wire:model.defer="data.message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Message" required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group submit">
                    <button type="submit" class="ps-btn">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
