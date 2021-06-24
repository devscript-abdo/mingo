<?php

namespace App\Repositories\Brand;

interface BrandInterface
{


    public function activeItems();

    public function all();

    public function query();

    public function model();

    public function getBrand($brand, $with = null);

}