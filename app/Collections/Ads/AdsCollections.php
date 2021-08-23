<?php

namespace App\Collections\Ads;

use Illuminate\Database\Eloquent\Collection;

class AdsCollections extends Collection
{


    public function groupByPosition()
    {
        return $this->groupBy(function ($item) {

            if ($item->location === 'top_slider') {
                return 'top_slider';
            }
            if ($item->location === 'center_home') {
                return 'center_home';
            }
            if ($item->location === 'bottom_home') {
                return 'bottom_home';
            }
            if ($item->location === 'top_products_page') {
                return 'top_products_page';
            }

            if ($item->where('location','single_product')->first()) {
                return 'single_product';
            }

            return 'default';
        });
    }
}
