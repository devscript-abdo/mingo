<?php

namespace App\Repositories\Page;

use App\Models\Page;

class PageRepository  implements PageInterface
{

    protected $model;

    public function __construct(Page $model)
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

    public function getPage($slug)
    {
        return $this->model->whereSlug($slug)->whereStatus('active')->first();
    }

    public function getFooters()
    {
        return $this->model->whereNotIn('slug', ['a-propos-de-nous'])
            ->get();
    }
}
