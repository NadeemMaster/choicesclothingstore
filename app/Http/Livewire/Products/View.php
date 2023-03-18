<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Review;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $quantityCount = 1, $reviews;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        $this->reviews = Review::where('product_id', $this->product->id)->get();
        $this->avgrating = round(Review::where('product_id', $this->product->id)->avg('rating'));

        return view('livewire.products.view', ['category' => $this->category, 'product' => $this->product, 'reviews' => $this->reviews, 'avgrating' => $this->avgrating]);
    }

    public function quantityIncrement()
    {
        if ($this->quantityCount < 5) {

            $this->quantityCount++;
        }
    }

    public function quantityDecrement()
    {
        if ($this->quantityCount > 1) {

            $this->quantityCount--;
        }
    }

    public function addToCart($product_id)
    {
        if (!session()->has('customer')) {
             session()->flash('fail', 'Please login to continue');
             return redirect('customer/login');
        } else {
            if (Cart::where([['user_id', session('customer')], ['product_id', $product_id]])->exists()) {
                 session()->flash('fail', 'Product already added to the cart');
            } else {
                if ($this->product->quantity > $this->quantityCount) {
                    Cart::create([
                        'user_id' => session('customer'),
                        'product_id' => $product_id,
                        'quantity' => $this->quantityCount
                    ]);
                    $this->emit('ItemCounter');
                     session()->flash('success', 'Product added to the cart');
                } else {
                     session()->flash('fail', 'Only ' . $this->product->quantity . ' piece remaining of this product');
                }
            }
        }
    }
    
    public function addCart($product_id)
    {

            if (Cart::where([['user_id', session('customer')], ['product_id', $product_id]])->exists()) {
                 session()->flash('fail', 'Product already added to the cart');
                 return redirect()->back();
            } else {
                Cart::create([
                    'user_id' => session('customer'),
                    'product_id' => $product_id,
                    'quantity' => '1'
                ]);
                $this->emit('ItemCounter');
                 session()->flash('success', 'Product added to the cart');
                 return redirect()->back();
            }
    }

}
