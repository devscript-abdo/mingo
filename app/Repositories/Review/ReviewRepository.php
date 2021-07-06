<?php

namespace App\Repositories\Review;

use App\Models\Review;

class ReviewRepository  implements ReviewInterface
{

    protected $model;

    public function __construct(Review $model)
    {

        $this->model = $model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getReview($slug)
    {
        return $this->model->whereSlug($slug)->whereStatus('active')->first();
    }
}
