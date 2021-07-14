<?php

namespace App\Repositories\Product;

interface ProductInterface
{


    public function activeItems();

    public function withRelated(array $related);

    public function all();

    public function query();

    public function showInNav();

    public function getProduct($product, $with = null);

    public function model();

    public function randomsHome();

    public function bestSearched();

    public function explore();
}
