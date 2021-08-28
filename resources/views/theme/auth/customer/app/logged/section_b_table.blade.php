<div class="col-lg-8">
    <div class="ps-section__right">
        <div class="ps-section--account-setting">
            <div class="ps-section__header">
                <h3>{{__('customer.customer_logged')}}</h3>
            </div>
          
            <div class="ps-section__content">
                <div class="ps-section__footer mb-2">
                    <a class="ps-btn ps-btn--sm" href="#" onclick="document.getElementById('deleteHistory').submit();">
                        Vider La list
                    </a>
                </div>
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
                            @if($sessions->count))
                                <tr>
                                    {{--<td>Lorem</td>--}}
                                    <td style="font-size: 17px;">{{$sessions->lastLogin->logged_in_at}}</td>
                                    <td>
                                        <span class="badge badge-danger" style="font-size: 17px;">
                                            {{$sessions->lastLogin->ip}}
                                        </span>
                                        | Last login
                                    </td>
                                    <td>
                                        <span class="badge badge-danger" style="font-size: 17px;">
                                            {{$sessions->lastLogin->machine}}
                                        </span>
                                    
                                    </td>
                                </tr>
                            @endif
                            @foreach ($sessionsAll as $session)
                                <tr>
                                   
                                    <td style="font-size: 17px;">{{$session->logged_in_at}}</td>
                                    <td>
                                        <span class="badge badge-warning" style="font-size: 17px;">
                                            {{$session->ip}}
                                        </span>
                                     
                                    </td>
                                    <td>
                                        <span class="badge badge-warning" style="font-size: 17px;">
                                            {{$session->machine}}
                                        </span>
                                        {{--$session->customer_id--}}
                                    </td>
                                </tr>
                            @endforeach
                   
                        </tbody>
                    </table>
                </div>

                <form action="{{route('customer.logged.delete')}}" method="post" hidden id="deleteHistory">
                    @csrf
                    @method('DELETE')
                    @honeypot
                    <input type="hidden" name="deleteHistory" value="1">
                </form>
            </div>
        </div>
    </div>
</div>