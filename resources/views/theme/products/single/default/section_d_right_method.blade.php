
<aside class="widget widget_product widget_features">
    <p><i class="icon-network"></i> {{__('singleProduct.shipping_worldwide')}}</p>
    <p><i class="icon-3d-rotate"></i>{{__('singleProduct.retour_7_days')}}</p>
    <p><i class="icon-receipt"></i> {{__('singleProduct.facture_disponible')}}</p>
    <p><i class="icon-credit-card"></i> {{__('singleProduct.payer_online_bon')}}</p>
</aside>

<aside class="widget widget_sell-on-site">
    <p>
        <i class="icon-store"></i> 
        {{__('singleProduct.create_account')}}
        <a href="{{route('customer.register')}}"> {{__('singleProduct.create_account_register')}}</a>
    </p>
</aside>

<aside class="widget widget_ads">
    <a href="{{$ads['single_product'][0]?->url ?? ''}}">
        <img src="{{$ads['single_product'][0]?->photo ?? ''}}" alt="{{$ads['single_product'][0]?->name ?? ''}}">
    </a>
</aside>