<div class="modal fade" 
    id="product-quickview-{{$product->slug}}" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="product-quickview-{{$product->slug}}" 
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <span class="modal-close" data-dismiss="modal" style="margin-left: 15px;">
                <i class="icon-cross2"></i>
            </span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail" data-vertical="false" style="max-width: 30%;margin-left: 14px;">
                        <div class="ps-product__images" data-arrow="true">
                            <div class="item">
                              
                                    <img src="{{$product->photo}}" alt="{{$product->field('name')}}">
                            
                            </div>
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h4>{{$product->field('name')}}</h4>
                        <h4 class="ps-product__price" style="font-size: 14px">
                            {{$product->formated_price}} {{__('symbole.mad')}}
                        </h4>
                        <div class="ps-product__shopping">

                            <a 
                                class="ps-btn--sm ps-btn ps-btn--black " 
                                href="#"
                                wire:click="addToCartHome({{$product->id}})"
                                onclick="return false;"
                            >
                                Add to cart
                            </a>
    
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>