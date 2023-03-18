<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders = Order::where('status', 'pending')->orderby('id', 'DESC')->paginate(10);
        return view('livewire.admin.order.pending', ['orders'=> $orders]);
    }
}
