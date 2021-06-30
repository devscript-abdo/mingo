<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">{{__('navbar.home')}}</a></li>
            <li><a href="{{route('customer.profil')}}">{{__('navbar.my_account')}}</a></li>
            <li>{{__('customer.customer_orders')}}</li>
            <li>{{__('customer.customer_order')}} # {{$order->full_number}} - {{$order->status}}</li>
        </ul>
    </div>
</div>