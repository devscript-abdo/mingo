<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;

class ModelsCollections extends Collection
{
    public function groupByCreatedDate()
    {
        return $this->groupBy(function ($item) {

            if ($item->created_at->isToday()) {
                return 'Today';
            }
            if ($item->created_at->isCurrentWeek()) {
                return 'this week';
            }
            if ($item->created_at->isLastWeek()) {
                return 'Last Week';
            }

            return 'Older';
        });
    }
}
