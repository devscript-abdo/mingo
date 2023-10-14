<?php

namespace App\Repositories\Review;

interface ReviewInterface
{
    public function all();

    public function query();

    public function getReview($slug);
}
