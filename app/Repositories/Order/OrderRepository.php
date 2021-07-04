<?php

namespace App\Repositories\Order;

use App\Models\Order;

class OrderRepository implements OrderInterface
{


    protected $model;

    public function __construct(Order $model)
    {
        if (!$this->model) {
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

    public function  query()
    {
        return $this->model()->query();
    }

    public function delete($id)
    {
        $model =  $this->model()->find($id);

        return $model->delete();
    }

    public function getCustomerOrders()
    {

        return auth()->guard('customer')->user()->orders()->with('products')->get();
    }

    public function getOrderDetail($slug)
    {
        if (auth()->guard('customer')->check()) {
            return auth()
                ->guard('customer')
                ->user()->orders()
                ->with('products')
                ->whereSlug($slug)
                ->firstOrFail();
        } else {
            return $this->model()->whereSlug($slug)->with('products')->firstOrFail();
        }
    }
}
