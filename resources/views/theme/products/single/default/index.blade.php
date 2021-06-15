

@include('theme.products.single.default.section_a_nav_add')
@include('theme.products.single.default.section_b_top')

<div class="ps-page--product">
    <div class="ps-container">
        <div class="ps-page__container">
            <div class="ps-page__left">
                @include('theme.products.single.default.section_c_product_detail')
            </div>

            <div class="ps-page__right">
                @include('theme.products.single.default.section_d_right_method')
                @include('theme.products.single.default.section_e_right_same_brand')
            </div>

        </div>
        {{--@include('theme.products.single.default.section_f_customer_product')--}}
        @include('theme.products.single.default.section_g_related')
    </div>
</div>
@include('theme.products.single.default.section_h_news_letter')