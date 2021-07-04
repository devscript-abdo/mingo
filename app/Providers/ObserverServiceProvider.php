<?php

namespace App\Providers;

use App\Models\Addresse;
use App\Models\Ads;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\Team;
use App\Models\Wishlist;
use App\Observers\AddresseObserver;
use App\Observers\AdsObserver;
use App\Observers\BrandObserver;
use App\Observers\CategoryObserver;
use App\Observers\ColorObserver;
use App\Observers\OrderObserver;
use App\Observers\PageObserver;
use App\Observers\ProductCollectionObserver;
use App\Observers\ProductObserver;
use App\Observers\TeamObserver;
use App\Observers\WishlistObserver;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Page as ModelsPage;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Ads::observe(AdsObserver::class);
        Product::observe(ProductObserver::class);

        Addresse::observe(AddresseObserver::class);
        Order::observe(OrderObserver::class);

        Color::observe(ColorObserver::class);
        Brand::observe(BrandObserver::class);

        Team::observe(TeamObserver::class);

        ModelsPage::observe(PageObserver::class);

        Wishlist::observe(WishlistObserver::class);

        ProductCollection::observe(ProductCollectionObserver::class);
    }
}
