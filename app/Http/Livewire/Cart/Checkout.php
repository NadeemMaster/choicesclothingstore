<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Checkout extends Component
{
    public $cartData, $totalCartAmount = 0;

    public $fullname, $email, $phone, $province, $district, $city, $postcode, $address, $status = NULL, $payment_mode = NULL, $payment_status = NULL, $session_id = NULL, $delivery_status='waiting confirmation';

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|numeric|digits:11',
            'province' => 'required|string|max:121',
            'district' => 'required|string|max:121',
            'city' => 'required|string|max:121',
            'postcode' => 'required|integer|digits:5',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => session('customer'),
            'tracking_no' => $this->genTrackingId(),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'province' => $this->province,
            'district' => $this->district,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'address' => $this->address,
            'delivery_status' => $this->delivery_status,
            'status' => $this->status,
            'payment_mode' => $this->payment_mode,
            'payment_status' => $this->payment_status,
            'session_id' => $this->session_id,
            'order_amount' => $this->totalCartAmount
        ]);

        foreach ($this->cartData as $cartItem) {

            if (!is_null($cartItem->product->discounted_price)) {
                $orderItems = Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->discounted_price
                ]);
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            } else {
                $orderItems = Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->selling_price
                ]);
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }
        }

        return $order;
    }

    public function genTrackingId()
    {
        do {
            $trackingId = 'ccs@' . Str::random(6);
        } while (Order::where('tracking_no', '=', $trackingId)->first());

        return $trackingId;
    }

    public function payByCard()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'pkr',
                    'product_data' => [
                        'name' => 'Order Amount',
                    ],
                    'unit_amount' => $this->totalCartAmount * 100,
                ],
                    'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', [], true). "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout', [], true),
          ]);
          
           
              $this->payment_mode = 'Debit or Credit Card';
              $this->payment_status = 'unpaid';
              $this->session_id = $checkout_session->id;
              $this->status = 'pending';
              $this->delivery_status = 'in progress';
              $this->placeOrder();
              
              return redirect($checkout_session->url);
              
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $this->payment_status = 'COD';
        $this->session_id = 'COD';
        $this->status = 'pending';
        $codorder = $this->placeOrder();
        if ($codorder) {
            Cart::where('user_id', session('customer'))->delete();

            session()->flash('alert', 'Order placed successfully');
            return redirect()->route('success');
        } else {
            session()->flash('fail', 'something went wrong try again');
        }
    }

    public function cartAmount()
    {
        $this->totalCartAmount = 0;

        $this->cartData = Cart::where('user_id', session('customer'))->get();
        foreach ($this->cartData as $cartItem) {
            if (!is_null($cartItem->product->discounted_price)) {
                $this->totalCartAmount += $cartItem->product->discounted_price * $cartItem->quantity;
            } else {
                $this->totalCartAmount += $cartItem->product->selling_price * $cartItem->quantity;
            }
        }
        return $this->totalCartAmount;
    }

    public function render()
    {
        if (Cart::where('user_id', session('customer'))->first()) {

            $this->totalCartAmount = $this->cartAmount();
            return view('livewire.cart.checkout', ['totalCartAmount' => $this->totalCartAmount, 'cartData' => $this->cartData]);
        } else {
            session()->flash('fail', 'Add some products to the Cart.');
            return view('cart.viewcart');
        }
    }
}
