<?php

namespace App\Repositories\ProductCollection;

interface ProductCollectionInterface
{


    public function all();

    public function query();

    public function model();

    public function showInHome();


}
