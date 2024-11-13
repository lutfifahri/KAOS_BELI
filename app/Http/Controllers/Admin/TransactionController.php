<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'content' => 'admin.transaction'
        ];

        return view('admin.layouts.index', ['data' => $data]);
    }

    public function datatable(Request $request)
    {
        $search = $request->search['value'];
        $data = Transaction::query();

        return DataTables::eloquent($data)
            ->filter(function ($query) use ($search) {
                if ($search) {
                    $query->where('number', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                }
            })
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->addColumn('total', function (Transaction $query) {
                return $query->total();
            })
            ->addColumn('action', function (Transaction $query) {
                return '
                    <button type="button" class="btn btn-primary btn-sm" onclick="showData(' . $query->id . ')">
                        <i class="ph-info me-1"></i> Detail
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->escapeColumns()
            ->toJson();
    }

    public function showData(Request $request)
    {
        $id = $request->id;
        $data = Transaction::with([
            'transactionDetail' => fn ($q) => $q->with(['product' => fn ($q) => $q->with(['printing', 'category']), 'sticker'])
        ])->findOrFail($id);

        return response()->json($data);
    }
}
