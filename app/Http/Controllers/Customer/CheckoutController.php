<?php

namespace App\Http\Controllers\Customer;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('cart.checkout');
    }

    public function success(Request $request)
    {
        if (session('alert')) {
            return view('cart.success');
        } else {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

            $sessionId = $request->get('session_id');

            try {
                $session = $stripe->checkout->sessions->retrieve($sessionId);
                if (!$session) {
                    throw new NotFoundHttpException;
                }
                $payment = $session->payment_status;
                if ($payment == 'unpaid') {
                    throw new NotFoundHttpException;
                } else {
                    $order = Order::where([['session_id', $session->id], ['payment_status', 'unpaid']])->first();

                    if (!$order) {
                        throw new NotFoundHttpException;
                    }
                    Cart::where('user_id', session('customer'))->delete();
                    $order->payment_status = 'paid';
                    $order->status = 'confirmed';
                    $order->confirmed_date = Carbon::now()->toDateTimeString();
                    $order->save();

                    session()->flash('alert', 'Order placed successfully');
                    return view('cart.success');
                }
            } catch (\Throwable $th) {

                throw new NotFoundHttpException;
            }
        }
    }
}
