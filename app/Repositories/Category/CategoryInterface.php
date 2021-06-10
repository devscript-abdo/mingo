<?php

namespace App\Repositories\Category;

interface CategoryInterface
{

    public function all();

    public function model();

    public function query();

    public function activeItems();

    public function getCategory($slug);

    public function getWithChildrens();

    public function randomsHome();

}
