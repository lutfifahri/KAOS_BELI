<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'cart' => Cart::where('ip', $request->ip())->get(),
            'content' => 'cart'
        ];

        return view('layouts.index', ['data' => $data]);
    }

    public function updateOrCheckout(Request $request)
    {
        if ($request->submit == 'update') {
            return $this->updateCart($request);
        } else if ($request->submit == 'checkout') {
            return $this->checkoutCart($request);
        } else {
            abort(404);
        }
    }

    private function updateCart(Request $request)
    {
        foreach ($request->id as $key => $id) {
            Cart::find($id)->update([
                'product_id' => $request->product_id[$key],
                'sticker_id' => $request->sticker_id[$key],
                'ip' => $request->ip(),
                'qty' => $request->qty[$key],
            ]);
        }

        return redirect()->back()->withInput()->with(['success' => 'Produk telah diupdate']);
    }

    public function checkoutCart(Request $request)
    {
        $transaction = Transaction::create([
            'number' => rand(0000000, 9999999),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address
        ]);

        foreach ($request->id as $key => $id) {
            $cart = Cart::find($id);

            $transaction->transactionDetail()->create([
                'product_id' => $cart->product_id,
                'sticker_id' => $cart->sticker_id,
                'image' => $cart->image,
                'price_product' => $cart->product->price,
                'price_sticker' => $cart->sticker->price,
                'qty' => $cart->qty
            ]);
        }

        Cart::where('ip', $request->ip())->delete();

        return redirect('/')->withInput()->with(['success' => 'Transaksi anda telah kami terima, anda akan segera dihubungi oleh tim kami']);
    }

    public function delete($id)
    {
        Cart::destroy($id);

        return redirect()->back()->with(['success' => 'Produk telah dihapus']);
    }
}
