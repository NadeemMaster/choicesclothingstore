<?php

namespace App\Http\Livewire\Orders;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Review;
use Livewire\Component;


class View extends Component
{
    public $order_id, $deliverydate, $orderitem_id, $rating, $comments;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
        $order = Order::where([['user_id', session('customer')],['id', $this->order_id]])->first();
        if ($order) {
            
            return view('livewire.orders.view', ['order'=> $order]);
        } else {
            session()->flash('fail','Order Id not found');
            return view('orders.index');
        }
    }

    
    public function cancelOrder()
    {
        $order = Order::findOrfail($this->order_id);
        if ($order->status == 'pending') {
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
        } else {
            session()->flash('fail','Somthing went wrong!');
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function confirmOrder()
    {
        $order = Order::findOrfail($this->order_id);
        if ($order->status == 'pending') {
            $order->status = 'confirmed';
            $order->delivery_status = 'in progress';
            $order->confirmed_date = Carbon::now()->toDateTimeString();
            $order->update();
            session()->flash('success','Order has been confirmed successfully!');
            $this->dispatchBrowserEvent('close-modal');
        } else {
            session()->flash('fail','Somthing went wrong!');
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function updateDelivery()
    {
        $this->validate([
            'deliverydate' => 'required|date',
        ]);
        $order = Order::findOrfail($this->order_id);
        if ($order->delivery_status == 'in progress') {
            $order->delivery_status = 'Received';
            $order->delivery_date = $this->deliverydate;
            $order->update();
            session()->flash('success','Delivery Status updated successfully!');
            $this->dispatchBrowserEvent('close-modal');
        } else {
            session()->flash('fail','Somthing went wrong!');
            $this->dispatchBrowserEvent('close-modal');
        }

    }

    public function writeReview($orderitem_id)
    {
        $this->orderitem_id = $orderitem_id;

    }

    public function submitReview()
    {
        $this->validate([
            'rating' => 'required',
            'comments' => 'required|string'
        ]);
        $order = Order::findOrfail($this->order_id);
        $product = Orderitem::findOrfail($this->orderitem_id);
        $orderitem = Review::where('order_item_id', $this->orderitem_id)->first();
        if ($order->delivery_status == 'Received') {
            if ($orderitem) {
                session()->flash('fail','Review already submitted');
                $this->dispatchBrowserEvent('close-modal');
            } else {
                $review = Review::create([
                    'user_id' => $order->user_id,
                    'product_id' => $product->product_id,
                    'order_item_id' => $this->orderitem_id,
                    'rating' => $this->rating,
                    'comments' => $this->comments
                ]);
                    session()->flash('success','Review submitted successfully!');
                    $this->dispatchBrowserEvent('close-modal');
            } 
        } else {
            session()->flash('fail','You can submit the review only after recieving the product.');
            $this->dispatchBrowserEvent('close-modal');
        }
    }
}
