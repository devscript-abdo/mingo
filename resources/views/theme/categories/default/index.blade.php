
@include('theme.categories.default.section_a_top')

<div class="ps-page--shop">

    <div class="ps-container">

        {{--@include('theme.categories.default.section_b_banner')--}}
        @include('theme.categories.default.section_c_brand')
        {{--@include('theme.categories.default.section_d_categories')--}}

        <div class="ps-layout--shop">

            <div class="ps-layout__left">
                @include('theme.categories.default.section_left_a_categories')
                @include('theme.categories.default.section_left_b_others')
            </div>

            <div class="ps-layout__right">
                {{--@include('theme.categories.default.section_right_a_best')
                @include('theme.categories.default.section_right_b_recomanded')--}}
                @include('theme.categories.default.section_right_c_products')
            </div>

        </div>
        @include('theme.categories.default.section_z_modal')
    </div>
</div>