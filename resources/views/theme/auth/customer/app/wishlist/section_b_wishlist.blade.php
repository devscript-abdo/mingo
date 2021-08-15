<div class="ps-section--shopping ps-whishlist">
    <div class="container">
        <div class="ps-section__header">
            <h1>{{__('customer.customer_wishlist')}}</h1>
          
        </div>
        <div class="ps-section__content">
            <div class="table-responsive">
                <table class="table ps-table--whishlist ps-table--responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{__('customer.customer_whislist_table_name')}}</th>
                            <th> {{__('customer.customer_whislist_table_price')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                            @foreach($list->products as $product)
                                <tr>
                                    <td data-label="Remove">
                                        <a href="#" onclick="document.getElementById('deleteWish{{$list->id}}').submit();">
                                            <i class="icon-cross"></i>
                                        </a>
                                        <form id="deleteWish{{$list->id}}" action="{{route('customer.wishlist.delete')}}" method="post" hidden>
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="productData" value="{{$list->id}}">

                                        </form>
                                    </td>
                                    <td data-label="Product">
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail">
                                                <a href="{{$product->url}}">
                                                    <img src="{{$product->photo}}" alt="">
                                                </a>
                                            </div>
                                            <div class="ps-product__content">
                                                <a href="{{$product->url}}">{{$product->field('name')}}</a>
                                            
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-label="Price">{{$product->price}} {{__('symbole.mad')}}</td>
                                    <td data-label="action"><a class="ps-btn" href="{{$product->url}}">{{__('buttons.add_to_cart')}}</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>