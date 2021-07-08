<?php

namespace App\Models\Search;

trait SearchTrait
{

    public function getSearchResult(): SearchResult
    {

        $url = route('blog.single', $this->slug);
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url

        );
    }
   
}
