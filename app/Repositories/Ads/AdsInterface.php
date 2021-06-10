<?php

namespace App\Repositories\Ads;

interface AdsInterface
{


    public function publishedItems();

    public function locationIn($location);

    public function all();

    public function query();

    public function model();

}
