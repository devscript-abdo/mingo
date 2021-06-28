<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>Orders</h3>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table ps-table--invoices">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
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
                                          view
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