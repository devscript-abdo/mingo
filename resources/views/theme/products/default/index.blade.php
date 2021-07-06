
@include('theme.products.default.section_a_top')

<div class="ps-page--shop">

    <div class="ps-container">

        @include('theme.products.default.section_b_banner')
        @include('theme.products.default.section_c_brand')
        {{--@include('theme.products.default.section_d_categories')--}}

        <div class="ps-layout--shop">

            <div class="ps-layout__left">
                @include('theme.products.default.section_left_a_categories')

                @include('theme.products.default.section_left_b_others')
            </div>

            <div class="ps-layout__right">
                
                {{--@include('theme.products.default.section_right_a_best')
                @include('theme.products.default.section_right_b_recomanded')--}}
                {{--@include('theme.products.default.section_right_c_products')--}}

                {{--@livewire('product.products',['productsModel' => $productsModel])--}}
                
                @if (request()->has('mingoFilter') && request()->filled('mingoFilter'))
                   @include('theme.products.default.section_right_c_products')
                @else
                    @livewire('product.products')
                @endif

            </div>

        </div>
        @include('theme.products.default.section_z_modal')
    </div>
</div>