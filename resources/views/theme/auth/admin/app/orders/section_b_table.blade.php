
<div class="col-lg-9">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
          
            <div class="ps-section__header">
             
                    <h3>Filters</h3>
               
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
                                <th>Numéro</th>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Total</th>
                                <th>Status</th>
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
                            @if(Arr::exists($orders,$status))
                             
                        
                                @foreach($orders[$status] as $order)
                                    <tr>
                                        <td><a href="{{route('admin.orders.show',$order->slug)}}">{{$order->full_number}}</a></td>
                                        <td>{{$order->billing_name}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->billing_address}}</td>
                                        <td>{{$order->billing_city}}</td>
                                        <td>{{$order->billing_total}} {{__('symbole.mad')}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>

                                            <a class="ps-btn ps-btn--sm" href="{{route('admin.orders.show',$order->slug)}}">
                                            Voir
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
                            @else
                            <p>No Result</p>
                            @endif
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>