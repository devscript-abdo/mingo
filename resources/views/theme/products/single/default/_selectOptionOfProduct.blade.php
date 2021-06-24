<div class="modal fade" id="product-option" tabindex="-1" role="dialog" aria-labelledby="product-option" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <form class="ps-form--subscribe-popup" action="" method="get">
                <div class="ps-form__content">

                    <h4>Select option </h4>


                    @if($product->colors)
                    <div class="form-group">
                        <label>Colors</label>
                        <select class="form-control singleProductsColors" name="colors[]" multiple>
                            @foreach($product->colors as $color)
                            <option value="{{$color->slug}}">{{$color->field('name')}}</option>
                           @endforeach
                        
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email Address" required>
                        <button class="ps-btn">Subscribe</button>
                    </div>
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="not-show" name="not-show">
                        <label for="not-show">Don't show this popup again</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>