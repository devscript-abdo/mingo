<?php

namespace App\Models;

use App\Scopes\ProviderProductsScope;
use App\Scopes\WithoutTranslationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Traits\Language;
use Illuminate\Support\Carbon;

class Product extends Model implements Searchable
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    use HasFactory, Translatable, Language;

    protected $translatable = ['name', 'description', 'content'];

    // protected $guarded = [];

    protected $with = ['translations'];

    protected $casts = [
        'formated_price' => 'decimal:2',
        ///'all_colors'=>'json',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category', 'product_id', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\models\Wishlist', 'wishlists', 'product_id', 'id');
    }

    public function attributesVariant()
    {
        return $this->belongsToMany('App\Models\Attribute', 'product_attribute', 'product_id', 'attribute_id');
    }

    public function attributesValues()
    {
        // return $this->hasManyThrough(AttributeValue::class, Attribute::class);

        return $this->hasManyThrough('App\Models\AttributeValue', 'App\Models\Attribute', 'attribute_id', 'product_id', 'id');
    }

    public function productCollections()
    {
        return $this->belongsToMany(
            ProductCollection::class,
            'product_collection_product',
            'product_id',
            'product_collection_id'
        );
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_product', 'product_id', 'order_id');
    }

    public function scopeActive($query)
    {

        return $query->whereActive(true);
    }

    public function scopeWithRelated($related)
    {
        return $this->active()->with($related)->get();
    }

    public function scopeTopSearched()
    {
        return $this->active()->whereTopSearched(true)->get();
    }

    /*****Explore page scope methode */

    public function scopeExploreProducts()
    {
        return $this->active()->with('translations')->inRandomOrder()->get();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->published_at->lessThanOrEqualTo(Carbon::now());
    }

    public function getFormatedPriceAttribute()
    {
        return $this->castAttribute('formated_price', $this->price);
    }

    public function getPhotoAttribute()
    {
        return Voyager::image($this->image);
    }

    public function getFirstPhotoAttribute()
    {
        $images =  json_decode($this->images);
        $image = isset($images);
        return Voyager::image($image ? array_shift($images) : setting('portfolio.portfolio_default_image'));
    }

    public function getAllPhotosAttribute()
    {
        $images =  json_decode($this->images) ?? [];

        $collection = collect($images);

        $imagesPaths = $collection->map(function ($item, $key) {

            return Voyager::image($item);
        });

        return $imagesPaths->all();
        //return $images;
    }

    /******************** 09-08-2021 ***************************/

    // this accessor is used For IP route
    public function getAllColorsAttribute()
    {
        if ($this->colors->count()) {
            $colors = collect($this->colors);

            $result = $colors->map(function ($item, $key) {

                $return = ['name' => $item->name, 'code' => $item->code];
                return (object)$return;
            });

            return $result->all();
        }
        return [];
    }

    // this accessor is used For IP route
    public function getAllAttributesAttribute()
    {
        if ($this->attributesVariant->count()) {

            $attrs = collect($this->attributesVariant);

            $result = $attrs->map(function ($item, $key) {
                //return  $item->values->whereIn('product_id', [$this->id]);
                return [
                    'name' => $item->name,
                    'values' => $item->values->whereIn('product_id', [$this->id])->toArray()
                ];
            });
            return $result->all();
        }
        return [];
    }
    public function getAllReviewsAttribute()
    {
        if ($this->reviews->count()) {
            $reviews = collect($this->reviews);
            $result = $reviews->map(function ($review, $key) {
                return [
                    'name' => $review->name,
                    'email' => $review->email,
                    'comment' => $review->comment,
                    'rating' => $review->rating
                ];
            });
            return $result->all();
        }
        return [];
    }


    public function getUrlAttribute()
    {
        return route('products.single', $this->slug);
    }

    public function getUrl()
    {
        return route('products');
    }

    public function getBrand($field)
    {
        return $this->brand->{$field} ?? null;
    }

    /*******Filters */
    public function scopeFiltersCategory(Builder $query, $category)
    {
        $categoryy = Category::whereSlug($category)->firstOrFail()->id;

        return $query
            ->where('category_id', $categoryy)
            ->orWhere('category_parent', $categoryy);
    }

    public function scopeFiltersBrand(Builder $query, $brand)
    {
        $brandd = Brand::whereSlug($brand)->firstOrFail()->id;

        return $query
            ->where('brand_id', $brandd);
    }

    public function scopeFiltersColor(Builder $query, $color)
    {
        $colorId = Color::whereSlug($color)->firstOrFail()->id;

        $query->whereHas('colors', function ($q) use ($colorId) {
            $q->where('color_id', $colorId);
        });
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



    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = self::max('id') + 1;
            $model->sku = str_pad($prefix . 'MNGP', 5, 0, STR_PAD_LEFT);
            // $model->serial_code = Str::uuid();
        });
    }

    /***********Global Scope added 14-08-2021 */

    protected static function booted()
    {
        static::addGlobalScope(new WithoutTranslationScope);
    }
}
