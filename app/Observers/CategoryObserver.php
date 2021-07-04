<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
    }
}
