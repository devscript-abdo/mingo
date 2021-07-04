<?php

namespace App\Repositories\Addresse;

use App\Models\Addresse;

class AddresseRepository implements AddresseInterface
{


    protected $model;

    public function __construct(Addresse $model)
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

    public function getCustomerAddresses()
    {

        return auth()->guard('customer')->user()->addresses()->get();
    }
}
