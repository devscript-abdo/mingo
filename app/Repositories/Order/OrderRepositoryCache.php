<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\CacheTrait;

class OrderRepositoryCache implements OrderInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(Order $model)
    {
        if (! $this->model) {
            $this->model = $model;
        }
    }

    public function model()
    {
        return $this->model;
    }

    public function all()
    {
        return $this->model()->all();
    }

    public function query()
    {
        return $this->model()->query();
    }

    public function delete($id)
    {
        $model = $this->model()->find($id);

        return $model->delete();
    }

    public function getCustomerOrders()
    {
        $auth = auth()->guard('customer')->user();

        $id = json_encode($auth->id);

        return $this->setCache()->remember("orders_cache_{$id}", $this->timeToLive(), function () use ($auth) {

            return $auth->orders()->with('products')->get();
        });
    }

    public function getOrderDetail($slug)
    {
        $slugg = json_encode($slug);
        if (auth()->guard('customer')->check()) {
            return $this->setCache()->remember("orders_cache_slug_{$slugg}", $this->timeToLive(), function () use ($slug) {
                return auth()
                    ->guard('customer')
                    ->user()->orders()
                    ->with('products')
                    ->whereSlug($slug)
                    ->firstOrFail();
            });
        } else {
            return $this->setCache()->remember("orders_cache_slug_{$slugg}", $this->timeToLive(), function () use ($slug) {

                return $this->model()->whereSlug($slug)->with('products')->firstOrFail();
            });
        }
    }
}
