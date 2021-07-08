<div>
    <form class="ps-form--quick-search" action="" method="get">
        <div class="form-group--icon"><i class="icon-chevron-down"></i>
            <select class="form-control">
                <option value="0" selected="selected">{{__('navbar.search_all')}}</option>
                <option class="level-0" value="babies-moms">Babies & Moms</option>
                <option class="level-0" value="books-office">Books & Office</option>
                <option class="level-0" value="cars-motocycles">Cars & Motocycles</option>
                <option class="level-0" value="clothing-apparel">Clothing & Apparel</option>
            </select>
        </div>
      
            <input 
                class="form-control @error('query') is-invalid @enderror"
                type="text" 
                name="query" 
                wire:model.defer="query" 
                placeholder="" 
                id="input-search"
            >
                @error('query')
                
                    <span class="invalid-feedback" role="alert" >
                        <strong style="color:white !important">{{ $message }}</strong>
                    </span>
                @enderror
        
        <button wire:click.prevent="submit()">{{__('navbar.search_button')}}</button>
        @if($results) 
            <div class="ps-panel--search-result @if(isset($class)){{$class}}@endif">
                
                    <div class="ps-panel__content">
                        @foreach($results->groupByType() as $type => $modelSearchResults)
                        
                        
                            <div class="ps-panel__footer text-center">
                                <a href="{{$modelSearchResults[0]->searchable->getUrl()}}">{{ $type }}</a>
                            </div>
                            @foreach($modelSearchResults as $searchResult)
                                <div class="ps-product ps-product--wide ps-product--search-result">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{ $searchResult->url }}">
                                            <img src="{{$searchResult->searchable->photo}}" alt="{{ $searchResult->title }}">
                                        </a>
                                    </div>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                                        <p class="ps-product__price">{{$searchResult->searchable->price}} {{__('symbole.mad')}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
        
                    </div>
                    <div class="ps-panel__footer text-center"><a href="{{route('products')}}">See all results</a></div>
            
            </div>
        @endif
    </form>
</div>
