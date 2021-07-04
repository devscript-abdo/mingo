<footer class="ps-footer">
    <div class="ps-container">
        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">{{__('footer.contact_us')}}</h4>
                <div class="widget_content">
                    <p>{{__('footer.call_us')}}</p>
                    <h3>{{setting('contacts.tele') ?? '0123456789'}}</h3>
                    <p>{{setting('contacts.address') ?? 'casablanca'}} <br>
                        <a href="">
                            <span class="__cf_email__" data-cfemail="5635393822373522163b3724223023242f783539">
                                {{setting('contacts.email') ?? 'mingo'}}
                            </span>
                        </a>
                    </p>
                    <ul class="ps-list--social">
                        <li><a class="facebook" href="{{setting('social.facebook') ?? '#'}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="{{setting('social.twitter') ?? '#'}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="instagram" href="{{setting('social.instagram') ?? '#'}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">{{__('footer.quik_link')}}</h4>
                <ul class="ps-list--link">

                    @foreach ($footerPages as $page)
                      <li><a href="{{route('site.page',$page->slug)}}">{{$page->field('title')}}</a></li>
                    @endforeach
                
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">{{__('footer.company')}}</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('about')}}">{{__('navbar.about')}}</a></li>
                    {{--<li><a href="#">Affilate</a></li>
                    <li><a href="#">Career</a></li>--}}
                    <li><a href="{{route('contact')}}">{{__('navbar.contact')}}</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">{{__('footer.account')}}</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('customer.profil')}}">{{__('navbar.my_account')}}</a></li>
                    <li><a href="{{route('products')}}">{{__('navbar.shop')}}</a></li>
                </ul>
            </aside>
        </div>
        <div class="ps-footer__links">

            @foreach($categories as $categorie)
                @if($categorie->parent_id === null && count($categorie->childrens))
                    <p>
                        <strong>{{$categorie->field('name')}}:</strong>
                        @foreach ($categorie->childrens as $categoriee)
                         <a href="{{$categoriee->url}}">{{$categoriee->field('name')}}</a>
                        @endforeach
                    </p>
                @endif
            @endforeach

        </div>
        <div dir="ltr" class="ps-footer__copyright">
            <p>© {{date('Y')}} Mingo. All Rights Reserved | powered by <a href="">Haymacproduction</a></p>
            <p>
                <span>{{__('footer.payment-method')}}</span>
                <a href="#"><img src="{{asset('assets/img/payment-method/1.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('assets/img/payment-method/2.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('assets/img/payment-method/3.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('assets/img/payment-method/4.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('assets/img/payment-method/5.jpg')}}" alt=""></a>
            </p>
        </div>
    </div>
</footer>