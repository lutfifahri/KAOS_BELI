<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sticker;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'sticker' => Sticker::paginate(6),
            'product' => Product::orderBy('category_id')->get(),
            'content' => 'home'
        ];

        return view('layouts.index', ['data' => $data]);
    }

    public function addToCart(Request $request)
    {
        $ip = $request->ip();
        $productId = $request->product_id;
        $stickerId = $request->sticker_id;
        $qty = $request->qty;

        $checkCart = Cart::where('ip', $ip)->where('product_id', $productId)->where('sticker_id', $stickerId)->count();
        if ($checkCart > 0) {
            echo '
                <script>
                    alert("Produk telah ada dikeranjang");
                    window.location.replace("' . url('/') . '")
                </script>
            ';
        }

        if ($request->_token == csrf_token()) {
            if ($request->method() == 'POST') {
                $file = $request->image['amm_canvas'];
                $fileName = 'public/transaction-detail/' . Str::random(40) . '.png';
                $fileBase64 = substr($file, strpos($file, ',') + 1);
                $fileDecode = base64_decode($fileBase64);

                Storage::put($fileName, $fileDecode);

                Cart::updateOrCreate([
                    'product_id' => $productId,
                    'sticker_id' => $stickerId,
                    'ip' => $ip
                ], [
                    'image' => $fileName,
                    'qty' => $qty
                ]);

                return response()->json(200);
            }

            $data = [
                'request' => $request,
                'product' => Product::find($request->product_id),
                'sticker' => Sticker::find($request->sticker_id),
                'content' => 'add-to-cart'
            ];

            return view('layouts.index', ['data' => $data]);
        }

        abort(404);
    }
}
