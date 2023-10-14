<?php

namespace App\Repositories\Ads;

interface AdsInterface
{
    public function publishedItems();

    public function locationIn($location, $limit);

    public function all();

    public function query();

    public function model();
}
