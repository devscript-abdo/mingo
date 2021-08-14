<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>{{__('customer.customer_logged')}}</h3>
            </div>
         
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table ps-table--notification">
                        <thead>
                            <tr>
                                {{--<th>{{__('customer.customer_notif_table_title')}}</th>--}}
                                <th>{{__('customer.customer_logged_date')}}</th>
                                <th>{{__('customer.customer_logged_ip')}}</th>
                                <th>{{__('customer.customer_logged_device')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{--<td>Lorem</td>--}}
                                <td>{{$sessions->lastLogin->logged_in_at}}</td>
                                <td>
                                    <span class="badge badge-primary" style="font-size: 17px;">
                                        {{$sessions->lastLogin->ip}}
                                    </span>
                                    | Last login
                                </td>
                                <td>
                                    <span class="badge badge-danger" style="font-size: 17px;">
                                        {{$sessions->lastLogin->device}}
                                    </span>
                                   
                                </td>
                            </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>