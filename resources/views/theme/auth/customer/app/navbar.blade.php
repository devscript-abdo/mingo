<div class="col-lg-4">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header"><img src="{{auth()->user()->profil_avatar}}" alt="mingo.ma">
                <figure>
                    <figcaption>Hello {{auth()->user()->name}}</figcaption>
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
                    <li class="{{request()->routeIs('customer.profil') ? 'active':''}}"><a href="{{route('customer.profil')}}"><i class="icon-user"></i> Account Information</a></li>
                    <li class="{{request()->routeIs('customer.notifications') ? 'active':''}}"><a href="{{route('customer.notifications')}}"><i class="icon-alarm-ringing"></i> Notifications</a></li>
                    <li class="{{request()->routeIs(['customer.invoices','customer.invoices.single']) ? 'active':''}}"><a href="{{route('customer.invoices')}}"><i class="icon-papers"></i> Invoices</a></li>
                    <li class="{{request()->routeIs('customer.addresses') ? 'active':''}}"><a href="{{route('customer.addresses')}}"><i class="icon-map-marker"></i> Address</a></li>
                    <li ><a href="{{route('customer.wishlist')}}"><i class="icon-store"></i> Recent Viewed Product</a></li>
                    <li class="{{request()->routeIs('customer.wishlist') ? 'active':''}}"><a href="{{route('customer.wishlist')}}"><i class="icon-heart"></i> Wishlist</a></li>
                    <li>
                        <a href="#" onclick="document.getElementById('logoutMingo').submit();">
                            <i class="icon-power-switch"></i>Logout
                        </a>
                    </li>

                    <form action="{{route('customer.logout')}}" method="post" hidden id="logoutMingo">
                        @csrf
                    </form>
                </ul>
            </div>
        </aside>
    </div>
</div>