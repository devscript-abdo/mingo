<div class="col-lg-3" dir="{{Mingo::currentLocale()==='ar'?'rtl':''}}">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header">
                
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
        
                    <li class="{{request()->routeIs(['admin.orders']) ? 'active':''}}">
                        <a href="{{route('admin.orders')}}">
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

                    <li>
                        <a href="#" onclick="document.getElementById('logoutAdmin').submit(); return false;">
                            <i class="icon-power-switch"></i>{{__('customer.customer_logout')}}
                        </a>
                    </li>

                    <form action="{{route('admin.logout')}}" method="post" hidden id="logoutAdmin">
                        @csrf
                        @honeypot
                    </form>
                </ul>
            </div>
        </aside>
    </div>
</div>