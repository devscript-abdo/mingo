<li>
    <div class="ps-dropdown language">
        <a 
          href="#"
          class="nav-link dropdown-toggle"
          data-toggle="dropdown"
          role="button"
          aria-haspopup="true"
          aria-expanded="false"
        >
            @php
              $default = Mingo::currentLocale()
            @endphp
            <img src="{{asset("assets/img/flag/{$default}.png")}}" alt="{{Mingo::currentLocaleName()}}" width="18" height="12">
             {{Mingo::currentLocaleName()}}
        </a>
        <ul class="ps-dropdown-menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li  class="nav-item dropdown"> 
                    <a 
                        rel="alternate" 
                        hreflang="{{ $localeCode }}" 
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                        class="dropdown-item" 
                    >
                    <img src="{{asset("assets/img/flag/{$localeCode}.png")}}" alt="{{ $localeCode }}"
                    width="18" height="12"
                    >
                    {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>