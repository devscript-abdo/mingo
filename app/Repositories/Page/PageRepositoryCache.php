<?php

namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\CacheTrait;

class PageRepositoryCache  implements PageInterface
{
    use CacheTrait;

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
        return $this->setCache()->remember('pages_cache', $this->timeToLive(), function () {
            return $this->model->all();
        });
    }

    public function getPage($slug)
    {
        $slg = json_encode($slug);
        return $this->setCache()->remember("page_cache_slug_{$slg}", $this->timeToLive(), function () use ($slug) {
            return $this->model->whereSlug($slug)->whereStatus('active')->first();
        });
    }

    public function getFooters()
    {
        return $this->setCache()->remember('page_cache_footers', $this->timeToLive(), function () {
            return $this->model->whereNotIn('slug', ['a-propos-de-nous'])
                ->get();
        });
    }
}
