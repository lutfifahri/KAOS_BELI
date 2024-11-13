<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sticker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecapController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->has('date') ? $request->date : date('Y-m-d');
        $sticker = Sticker::whereHas('transactionDetail', function ($query) use ($date) {
            $query->whereDate('created_at', $date);
        })->get();

        $data = [
            'date' => $date,
            'sticker' => $sticker,
            'content' => 'admin.recap'
        ];

        return view('admin.layouts.index', ['data' => $data]);
    }
}
