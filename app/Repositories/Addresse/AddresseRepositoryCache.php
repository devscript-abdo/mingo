<?php

namespace App\Repositories\Addresse;

use App\Models\Addresse;
use App\Repositories\CacheTrait;

class AddresseRepositoryCache implements AddresseInterface
{
    use CacheTrait;

    protected $model;

    public function __construct(Addresse $model)
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
        return $this->setCache()->remember('addresse_cache', $this->timeToLive(), function () {
            return $this->model()->all();
        });
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

    public function getCustomerAddresses()
    {
        $auth = auth()->guard('customer')->user();

        $id = json_encode($auth->id);

        return $this->setCache()->remember("addresse_customer_cache_{$id}", $this->timeToLive(), function () use ($auth) {

            return $auth->addresses()->get();
        });
    }
}
