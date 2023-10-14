<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @return void
     */
    public function created(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
        cache()->pull('categories_in_home');
        cache()->pull('categories_of_navbar');
        cache()->pull('categoriesMenu');
        cache()->pull('categories_cache_with');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @return void
     */
    public function updated(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
        cache()->pull('categories_in_home');
        cache()->pull('categories_of_navbar');
        cache()->pull('categoriesMenu');
        cache()->pull('categories_cache_with');
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @return void
     */
    public function deleted(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
        cache()->pull('categories_in_home');
        cache()->pull('categories_of_navbar');
        cache()->pull('categoriesMenu');
        cache()->pull('categories_cache_with');
    }

    /**
     * Handle the Category "restored" event.
     *
     * @return void
     */
    public function restored(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
        cache()->pull('categories_in_home');
        cache()->pull('categories_of_navbar');
        cache()->pull('categoriesMenu');
        cache()->pull('categories_cache_with');
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        $sluger = json_encode($category->slug);
        cache()->pull('categories_cache');
        cache()->pull('categories_cache_active');
        cache()->pull("categorie_cache_{$sluger}");
        cache()->pull('categories_cache_childrens');
        cache()->pull('categories_in_home');
        cache()->pull('categories_of_navbar');
        cache()->pull('categoriesMenu');
        cache()->pull('categories_cache_with');
    }
}
