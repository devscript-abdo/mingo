<?php

namespace App\Http\Mingo\Livewire\Search;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Spatie\Searchable\Search as Searchable;

class Search extends Component
{

    public $query;

    public $results;
    public $class;

    protected $rules = ['query' => 'required|string'];

    protected $messages = [
        'query.required' => 'tapez ce que vous voulez trouvé'
    ];
    public function render()
    {
        return view('livewire.search.search', ['results' => $this->results]);
    }

    public function submit()
    {
        $this->validate();

        $this->results = $this->runSearcher($this->query);
    }

    public function runSearcher($q)
    {
        $searchResults = (new Searchable())
            ->registerModel(Product::class, ['name', 'content', 'description'])
            ->registerModel(Category::class, ['name', 'slug'])

            ->search($q);

        $this->class = "active";

        return $searchResults;
    }
}
