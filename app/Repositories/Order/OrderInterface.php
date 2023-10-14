<?php

namespace App\Repositories\Order;

interface OrderInterface
{
    public function all();

    public function query();

    public function model();

    public function delete($id);

    public function getOrderDetail($order);

    public function getCustomerOrders();
}
