<?php

namespace App\Http\View\Composers;

use App\Repositories\Category\CategoryInterface;
use Illuminate\Cache\CacheManager;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;

    protected $cache;

    public function __construct(CategoryInterface $categories, CacheManager $cache)
    {
        // Dependencies are automatically resolved by the service container...
        if (! $this->categories) {
            $this->categories = $categories;
        }
        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        //$view->with('categories', $this->categories->getWithChildrens());

        $view->with('categories', $this->cache->remember('categories', $this->timeToLive() /* cache expired time(mins) */, function () {
            return $this->categories->getWithChildrens();
        }));

        $view->with('categoriesMenu', $this->cache->remember('categoriesMenu', $this->timeToLive() /* cache expired time(mins) */, function () {
            return $this->categories->categoryInMenu();
        }));
    }

    private function timeToLive()
    {

        return \Carbon\Carbon::now()->addDays(30);
    }
}
