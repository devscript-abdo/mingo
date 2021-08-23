@php
$default = Mingo::currentLocale()
@endphp
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="{{asset("assets/img/flag/{$default}.png")}}" alt="{{ $default }}"
        width="18" height="12"
        >
        {{Mingo::currentLocaleName()}}
    </a>
    <div class="dropdown-menu">

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    
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
            
        @endforeach
    </div>
</li>