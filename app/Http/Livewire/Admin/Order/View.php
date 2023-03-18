<?php

namespace App\Http\Livewire\Admin\Order;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;

class View extends Component
{
    public $order_id, $deliverydate;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
        $order = Order::where('id', $this->order_id)->first();
        if ($order) {
            
            return view('livewire.admin.order.view', ['order'=> $order]);
        } else {
            session()->flash('fail','Order Id not found');
            return view('admin.orders.index');
        }

    }

    public function rules()
    {
        return [
            'deliverydate' => 'required|date'
        ];
    }

    public function updateDelivery()
    {
        $this->validate();
        $order = Order::findOrfail($this->order_id);
        $order->delivery_status = 'Received';
        $order->delivery_date = $this->deliverydate;
        $order->update();

        session()->flash('success','Delivery Status updated successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancelOrder()
    {
        $order = Order::findOrfail($this->order_id);
        $order->status = 'canceled';
        $order->delivery_status = 'order cenceled';
        $order->canceled_date = Carbon::now()->toDateTimeString();
        $order->update();

        $orderitems = Orderitem::where('order_id', $this->order_id)->get();
        foreach ($orderitems as $orderitem) {
                $orderitem->product()->where('id', $orderitem->product_id)->increment('quantity',$orderitem->quantity);
        }
        
        session()->flash('success','Order has been canceled successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirmOrder()
    {
        $order = Order::findOrfail($this->order_id);
        $order->status = 'confirmed';
        $order->delivery_status = 'in progress';
        $order->confirmed_date = Carbon::now()->toDateTimeString();
        $order->update();

        session()->flash('success','Order has been confirmed successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

}
