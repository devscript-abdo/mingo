<?php

namespace App\Http\Mingo\Livewire\Search;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Spatie\Searchable\Search as Searchable;

class Search extends Component
{

    public $query;
    public $search;
    public $results;
    public $class;

    protected $rules = ['query' => 'required|string'];

    protected $messages = [
        'query.required' => 'tapez ce que vous voulez trouvé'
    ];
    public function render()
    {
        return view('livewire.search.searchTow', ['results' => $this->results]);
    }

    public function submit()
    {
        $this->validate();
        if (isset($this->query)) {
            $this->results = $this->getData($this->query);
        }
    }

    public function runSearcher($q)
    {
        if (isset($this->query)) {


            $searchResults = (new Searchable())
                ->registerModel(Product::class, ['name', 'content', 'description'])
                ->registerModel(Category::class, ['name', 'slug'])

                ->search($q);

            $this->class = "active";

            return $searchResults;
        }
    }

    public function getData($query)
    {
        $search = '%' . $query . '%';
        // $search = '%' . $this->search . '%';
        $searchResults = Product::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('content', 'like', $search)
            ->get();

        /*$this->cats     = Category::where('name', 'like', $search)->get();*/
        $this->class = "active";

        return $searchResults;
    }
}
