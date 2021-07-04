<?php

namespace App\Repositories\Addresse;


interface AddresseInterface {

    public function all();

    public function  query();

    public function model();

    public function delete($id);

    public function getCustomerAddresses();
}