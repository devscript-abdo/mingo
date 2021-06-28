<?php

namespace App\Repositories\Page;

use App\Models\Page;

use Illuminate\Cache\CacheManager;

class PageRepositoryCache  implements PageInterface
{

    protected $model;

    protected $cache;

    const TTL = 1440; // TTL(Time To Live) 1440 = 1day

    public function __construct(Page $model, CacheManager $cache)
    {
        $this->cache = $cache;

        $this->model = $model;
    }


    public function query()
    {
        return $this->model->query();
    }

    public function all()
    {
        return $this->cache->remember('pages_cache', self::TTL, function () {
            return $this->model->all();
        });
    }

    public function getPage($slug)
    {
        return $this->cache->remember('page_cache' . $slug, self::TTL, function () use ($slug) {
            return $this->model->whereSlug($slug)->whereStatus('active')->first();
        });
    }

    public function getFooters()
    {
        return $this->cache->remember('page_cache_footers', self::TTL, function () {
            return $this->model->whereNotIn('slug', ['a-propos-de-nous', 'devenir-partenaire', 'nos-magazines'])
                ->get();
        });
    }
}
