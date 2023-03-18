<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartItemCounter extends Component
{
    public $cartItemCounter;

    protected $listeners = ['ItemCounter' => 'itemCount'];

    public function itemCount()
    {
        if (session()->has('customer')) {
            return $this->cartItemCounter = Cart::where('user_id', session('customer'))->count();
        } else {
            return $this->cartItemCounter = 0;
        }
    }

    public function render()
    {
        $this->cartItemCounter = $this->itemCount();
        return view('livewire.cart.cart-item-counter', ['cartItemCounter' => $this->cartItemCounter]);
    }
}
