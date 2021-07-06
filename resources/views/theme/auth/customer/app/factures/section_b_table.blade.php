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
                                <th>code</th>
                                <th>{{__('customer.customer_orders_table_date')}}</th>
                                <th>{{__('customer.customer_orders_table_status')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($factures as $facture)
                                <tr>
                                    <td><a href="{{route('customer.factures.view',$facture->serial_code)}}">{{$facture->serial_numer}}</a></td>
                                    <td>{{$facture->created_at}}</td>
                                
                                    <td>{{$facture->count_download}}</td>
                                    <td>

                                        <a class="ps-btn ps-btn--sm" href="{{$facture->url}}" target="_blank">
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