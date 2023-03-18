<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('customer.orders.index');
    }

    public function received()
    {
        return view('customer.orders.received');
    }

    public function confirmed()
    {
        return view('customer.orders.confirmed');
    }

    public function pending()
    {
        return view('customer.orders.pending');
    }

    public function view($order_id)
    {
        return view('customer.orders.view', compact('order_id'));
    }

}
