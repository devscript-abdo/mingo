
<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <ul class="nav nav-tabs">
            
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                          Status
                        </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="?fliter[status]=pending">pending</a>
                        <a class="dropdown-item" href="?fliter[status]=processing">processing</a>
                        <a class="dropdown-item" href="?fliter[status]=completed">completed</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?fliter[status]=canceled">canceled</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
        
                  </ul>
            </div>
        </div>
    </div>
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
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @php

                                $status = 'pending';

                                if (request()->has('fliter.status')){
                                   
                                    $status = request()->fliter['status'];

                                }

                            @endphp

                            @foreach($orders[$status] as $order)
                                <tr>
                                    <td><a href="{{route('customer.invoices.single',$order->slug)}}">{{$order->full_number}}</a></td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->billing_total}} {{__('symbole.mad')}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>

                                        <a class="ps-btn ps-btn--sm" href="{{route('customer.invoices.single',$order->slug)}}">
                                          {{__('customer.customer_orders_table_view')}}
                                        </a>



                                    </td>
                                    <td>
                                        
                                            <a 
                                                class="ps-btn ps-btn--sm" 
                                                href="#"
                                                onclick="document.getElementById('{{$order->slug}}').submit();"
                                            >
                                                {{__('customer.customer_orders_table_delete')}}
                                            </a>
                                       
                                    </td>
                                </tr>
                                
                                    <form action="{{route('customer.invoices.delete')}}" method="post" hidden id="{{$order->slug}}">
                                        @csrf
                                        @honeypot
                                        @method('DELETE')
                                        <input type="hidden" name="ordercancel" value="{{$order->slug}}">
                                    </form>
                               
                            @endforeach
           
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>