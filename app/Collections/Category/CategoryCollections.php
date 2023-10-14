<?php

namespace App\Collections\Category;

use Illuminate\Database\Eloquent\Collection;

class CategoryCollections extends Collection
{
    public function groupByType(): CategoryCollections
    {
        return $this->groupBy(function ($item) {

            if ($item->show_in_home) {
                return 'categories_in_home';
            }

            if ($item->category_of_year) {
                return 'categories_of_year';
            }
            if ($item->show_in_navbar) {
                return 'show_in_navbar';
            }

            return 'categories';
        });
    }
}
