<div class="col-lg-4">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header"><img src="{{auth()->user()->profil_avatar}}" alt="mingo.ma">
                <figure>
                    <figcaption>
                          {{__('customer.customer_hello')}}
                         {{auth()->user()->name}}
                    </figcaption>
                    <p>
                        <a href="#">
                            <span class="__cf_email__" data-cfemail="f98c8a9c8b9798949cb99e94989095d79a9694">
                                {{auth()->user()->email}}
                            </span>
                        </a>
                    </p>
                </figure>
            </div>
            <div class="ps-widget__content">
                <ul>
                    <li class="{{request()->routeIs('customer.profil') ? 'active':''}}">
                        <a href="{{route('customer.profil')}}">
                            <i class="icon-user"></i>
                            {{__('customer.customer_info_title')}}
                        </a>
                    </li>
                    <li class="{{request()->routeIs('customer.notifications') ? 'active':''}}">
                        <a href="{{route('customer.notifications')}}">
                            <i class="icon-alarm-ringing"></i>
                            {{__('customer.customer_notification')}}
                        </a>
                    </li>
                    <li class="{{request()->routeIs(['customer.invoices','customer.invoices.single']) ? 'active':''}}">
                        <a href="{{route('customer.invoices')}}">
                            <i class="icon-papers"></i> 
                            {{__('customer.customer_orders')}}
                        </a>
                    </li>
                    <li class="{{request()->routeIs(['customer.factures']) ? 'active':''}}">
                        <a href="{{route('customer.factures')}}">
                            <i class="icon-papers"></i> 
                            {{__('customer.customer_factures')}}
                        </a>
                    </li>
                    <li class="{{request()->routeIs('customer.addresses') ? 'active':''}}">
                        <a href="{{route('customer.addresses')}}">
                            <i class="icon-map-marker"></i> 
                            {{__('customer.customer_address')}}
                        </a>
                    </li>
                    {{--<li ><a href="{{route('customer.wishlist')}}"><i class="icon-store"></i> Recent Viewed Product</a></li>--}}
                    <li class="{{request()->routeIs('customer.wishlist') ? 'active':''}}">
                        <a href="{{route('customer.wishlist')}}">
                            <i class="icon-heart"></i> 
                            {{__('customer.customer_wishlist')}}
                        </a>
                    </li>
                    <li class="{{request()->routeIs('customer.logged') ? 'active':''}}">
                        <a href="{{route('customer.logged')}}">
                            <i class="icon-list"></i> 
                            {{__('customer.customer_logged')}}
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="document.getElementById('logoutM').submit();">
                            <i class="icon-power-switch"></i>{{__('customer.customer_logout')}}
                        </a>
                    </li>

                    <form action="{{route('customer.logout')}}" method="post" hidden id="logoutM">
                        @csrf
                        @honeypot
                    </form>
                </ul>
            </div>
        </aside>
    </div>
</div>