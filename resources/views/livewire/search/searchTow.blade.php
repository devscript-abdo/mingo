<div>
    <form class="ps-form--quick-search" action="" method="post" autocomplete="off">
        @csrf
        @honeypot
        {{--<div class="form-group--icon">
            <i class="icon-chevron-down"></i>
            <select class="form-control">
                <option value="0" selected="selected">{{__('navbar.search_all')}}</option>
                <option class="level-0" value="babies-moms">Babies & Moms</option>

            </select>
        </div>--}}
      
            <input 
                class="form-control @error('query') is-invalid @enderror"
                type="text" 
                name="query" 
                wire:model.debounce.900ms="query" 
                wire:keydown.debounce.900ms="submit()"
                placeholder=" @error('query') {{ $message }} @enderror" 
                id="input-search"
            >
                
            
        <button wire:click.prevent="submit()">{{__('navbar.search_button')}}</button>
        @if($results) 
            <div class="ps-panel--search-result @if(isset($class)){{$class}}@endif">
                
                    <div class="ps-panel__content">
                    

                            @foreach($results as $searchResult)
                                <div class="ps-product ps-product--wide ps-product--search-result">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{ $searchResult->url }}">
                                            <img src="{{$searchResult->photo}}" alt="{{ $searchResult->field('name') }}">
                                        </a>
                                    </div>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="{{ $searchResult->url }}">
                                            {{ $searchResult->field('name') }}
                                        </a>
                                        <p class="ps-product__price">{{$searchResult->price}} {{__('symbole.mad')}}</p>
                                    </div>
                                </div>
                            @endforeach
                     
        
                    </div>
                    <div class="ps-panel__footer text-center"><a href="{{route('products')}}">See all results</a></div>
            
            </div>
        @endif
    </form>
</div>
