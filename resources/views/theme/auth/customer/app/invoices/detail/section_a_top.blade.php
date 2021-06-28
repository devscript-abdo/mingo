<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('customer.profil')}}">Account</a></li>
            <li>Orders</li>
            <li>Order #{{$order->full_number}} - {{$order->status}}</li>
        </ul>
    </div>
</div>