<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartView extends Component
{
    public $cart, $subtotal =0;

    public function render()
    {
        $this->cart = Cart::where('user_id', session('customer'))->get();
        return view('livewire.cart.cart-view', ['cart' => $this->cart]);
    }

    public function quantityIncrement(int $cart_id)
    {
        $cartData = Cart::where([['id', $cart_id], ['user_id', session('customer')]])->first();
        if ($cartData) {
        if ($cartData->quantity < $cartData->product->quantity && $cartData->quantity < 5 ) {
            
            $cartData->increment('quantity');
            session()->flash('success','Quantity increased successfully!');
        } else {
            session()->flash('fail','You cannot add more!');
        }
        } else {
            session()->flash('fail','Somthing went wrong!');
        }
    }

    public function quantityDecrement(int $cart_id)
    {
        $cartData = Cart::where([['id', $cart_id], ['user_id', session('customer')]])->first();
        if ($cartData) {
        if ($cartData->quantity > 1) {

            $cartData->decrement('quantity');
            session()->flash('success','Quantity decreased successfully!');
        }
        } else {
            session()->flash('fail','Somthing went wrong!');
        }
    }

    public function deleteItem(int $cart_id)
    {
        $checkCart = Cart::where([['user_id', session('customer')], ['id', $cart_id]])->first();
        if ($checkCart) {
            $checkCart->delete();
            $this->emit('ItemCounter');
            session()->flash('success', 'Item removed from the cart');
        } else {
            session()->flash('fail','Somthing went wrong!');
        }
    }

}
