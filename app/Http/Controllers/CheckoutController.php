<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Subscription;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // Stripe APIキーの設定
        Stripe::setApiKey(config('services.stripe.secret'));


        // Stripeの支払い処理を実行
        $charge = PaymentIntent::create([
            'amount' => 1000, // 金額（単位は通貨に依存）
            'currency' => 'USD', // 通貨
            'source' => '999', // クレジットカードトークン
            'description' => 'Example charge', // 説明
        ]);

        // 支払いが成功した場合の処理
        return redirect()->back()->with('success', 'Payment successful!');
    }

    public function store(Request $request)
    {
        $cart = Cart::instance(Auth::user()->id)->content();

        $has_carriage_cost = false;

        foreach ($cart as $product) {
            if ($product->options->carriage) {
                $has_carriage_cost = true;
            }
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $line_items = [];

        foreach ($cart as $product) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price,
                ],
                'quantity' => $product->qty,
            ];
        }

        if ($has_carriage_cost) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => '送料',
                    ],
                    'unit_amount' => env('CARRIAGE'),
                ],
                'quantity' => 1,
            ];
        }

        $checkout_session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.index'),
        ]);

        return redirect($checkout_session->url);
    }

    public function success()
    {
        return view('checkout.success');
    }
}
