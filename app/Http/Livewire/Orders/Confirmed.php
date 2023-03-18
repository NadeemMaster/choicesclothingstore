<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Confirmed extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders = Order::where([['user_id', session('customer')],['status', 'confirmed'],['delivery_status', 'in progress'],])->orderby('id', 'DESC')->paginate(5);
        return view('livewire.orders.confirmed', ['orders'=> $orders]);
    }
}
