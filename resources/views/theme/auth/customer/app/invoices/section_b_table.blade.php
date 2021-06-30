<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>{{__('customer.customer_orders')}}</h3>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table ps-table--invoices">
                        <thead>
                            <tr>
                                <th>{{__('customer.customer_orders_table_id')}}</th>
                                <th>{{__('customer.customer_orders_table_date')}}</th>
                                <th>{{__('customer.customer_orders_table_total')}}</th>
                                <th>{{__('customer.customer_orders_table_status')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><a href="{{route('customer.invoices.single',$order->slug)}}">{{$order->full_number}}</a></td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->billing_total}} MAD</td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        <a class="ps-btn ps-btn--sm" href="{{route('customer.invoices.single',$order->slug)}}">
                                          {{__('customer.customer_orders_table_view')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>