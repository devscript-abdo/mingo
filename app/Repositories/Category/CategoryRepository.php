<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository  implements CategoryInterface
{

    protected $model;

    public function __construct(Category $model)
    {

        $this->model = $model;
    }


    public function model()
    {
        return $this->model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function activeItems()
    {
        return $this->model->active();
    }

    public function getCategory($slug)
    {
        return $this->model->whereSlug($slug)
            ->with(['products'])
            ->firstOrFail();
    }
    public function getWithChildrens()
    {
        /*****Method one  Take multiple Query  */

        /* return $this->model()
            ->where('parent_id', null)
            ->with('childrens')
            ->select(['id', 'parent_id', 'slug', 'name', 'icon'])
            ->get();*/

        /****Method Tow take one Query */
        return $this->model()::tree();
    }
    public function randomsHome()
    {
        return $this->model->inHome();
    }

    public function categoryOfYear()
    {
        return $this->model->categoryOfYear();
    }

    public function categoryInMenu()
    {
        return $this->model->showInMenu();
    }
}
