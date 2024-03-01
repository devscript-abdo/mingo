<?php

namespace App\Collections\Product;

use Illuminate\Database\Eloquent\Collection;

class ProductCollections extends Collection
{
    public function groupByCreatedDate()
    {
        return $this->groupBy(function ($product) {

            if ($product->created_at->isToday()) {
                return 'Today';
            }
            if ($product->created_at->isCurrentWeek()) {
                return 'this week';
            }
            if ($product->created_at->isLastWeek()) {
                return 'Last Week';
            }

            return 'Older';
        });
    }

    public function groupByRelated()
    {
    }
}
