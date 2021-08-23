<?php

namespace App\Collections\Order;

use Illuminate\Database\Eloquent\Collection;

class OrderCollections extends Collection
{


    public function groupByStatus()
    {
        return $this->groupBy(function ($item) {

            if ($item->status === 'pending') {
                return 'pending';
            }
            if ($item->status === 'processing') {
                return 'processing';
            }
            if ($item->status === 'completed') {
                return 'completed';
            }
            if ($item->status === 'canceled') {
                return 'canceled';
            }
            return 'normal';
        });
    }
}
