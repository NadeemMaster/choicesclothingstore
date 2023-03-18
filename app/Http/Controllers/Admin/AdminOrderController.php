<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function delivered()
    {
        return view('admin.orders.delivered');
    }

    public function confirmed()
    {
        return view('admin.orders.confirmed');
    }

    public function pending()
    {
        return view('admin.orders.pending');
    }

    public function view($order_id)
    {
        return view('admin.orders.view', compact('order_id'));
    }
}
