<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Category as Categories;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Traits\Language;

class Category extends Categories implements Searchable
{

    use HasFactory, Language, Translatable;

    protected $translatable = ['name', 'description'];

    protected $with = ['childrens', 'translations'];


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->with('childrens');
    }
    public function subcategory()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function parents()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }

    public function providers()
    {
        return $this->belongsToMany('App\Models\Provider', 'provider_category', 'category_id', 'provider_id');
    }


    public function getUrlAttribute()
    {
        return route('categories.single', $this->slug);
    }


    public function getAvatarAttribute()
    {
        return $this->icon;
    }

    public function getPhotoAttribute()
    {
        $image  = Voyager::image($this->image);
        return $image;
    }
    public function getUrl()
    {
        return route('products');
    }

    public function scopeRandoms($query)
    {
        // return $query->with('products')->inRandomOrder()->get();
        return $query->with(['products' => fn ($q) => $q->where('inHome', true)
            //->with(['colors'])
            ->inRandomOrder()
            ->limit(3)])
            ->has('products')
            ->inRandomOrder()
            ->first();
    }

    public function scopeInHome($query)
    {
        //return Cache::remember($this->cacheKey() . ':categoriesHome', $this->timeToLive(), function () use ($query) {
        return $query->with(['products.productCollections' => fn ($q) => $q->whereActive(true)])
            ->whereShowInHome(true)
            ->limit(3)
            ->has('products')
            ->inRandomOrder()
            ->get();
        // });
    }

    public function scopeCategoryOfYear($query)
    {
        //return Cache::remember($this->cacheKey() . ':categoriesYEAR', $this->timeToLive(), function () use ($query) {
        return $query->whereCategoryOfYear(true)->get();
        // });
    }

    public function scopeShowInMenu($query)
    {
        // return Cache::remember($this->cacheKey() . ':categoriesMenu', $this->timeToLive(), function () use ($query) {
   
        // });
        return $query->whereShowInNavbar(true)
        ->with(['translations'])
        ->get();
    }

    /****** */

    /*public function cacheKey()
    {
        return sprintf(
            "%s/%s",
            $this->getTable(),
            $this->getKey(),
            // $this->updated_at->timestamp
        );
    }*/

    private function timeToLive()
    {

        return \Carbon\Carbon::now()->addDays(30);
    }



    /************************** */

    public function getSearchResult(): SearchResult
    {

        $url = $this->url;
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->field('name'),
            $url
        );
    }
}
