<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sticker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StickerController extends Controller
{
    public function index()
    {
        $data = [
            'bank' => collect(json_decode(file_get_contents(asset('assets/bank.json'))))->sortBy('name')->values()->all(),
            'content' => 'admin.sticker'
        ];

        return view('admin.layouts.index', ['data' => $data]);
    }

    public function datatable(Request $request)
    {
        $search = $request->search['value'];
        $data = Sticker::query();

        return DataTables::eloquent($data)
            ->filter(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('bank', 'like', "%$search%")
                        ->orWhere('account_number', 'like', "%$search%");
                }
            })
            ->editColumn('price', '{{ number_format($price, 0, ".", ".") }}')
            ->editColumn('image', function (Sticker $query) {
                return '<img src="' . $query->image() . '" class="img img-thumbnail" style="max-width:50px;">';
            })
            ->addColumn('action', function (Sticker $query) {
                return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-sm fw-semibold dropdown-toggle" data-bs-toggle="dropdown">Aksi</button>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0);" class="dropdown-item fs-13" onclick="showDataUpdate(' . $query->id . ')">
                                <i class="ph-pen me-2"></i>
                                Ubah Data
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item fs-13" onclick="destroyData(' . $query->id . ')">
                                <i class="ph-trash-simple me-2"></i>
                                Hapus Data
                            </a>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action', 'image'])
            ->addIndexColumn()
            ->escapeColumns()
            ->toJson();
    }

    public function createData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'name' => 'required',
            'price' => 'required'
        ], [
            'image.required' => 'gambar tidak boleh kosong',
            'image.image' => 'gambar tidak tidak valid',
            'image.mimes' => 'gambar harus ekstensi PNG, JPG, JPEG',
            'name.required' => 'nama tidak boleh kosong',
            'price.required' => 'harga tidak boleh kosong'
        ]);

        if ($validation->fails()) {
            $response = [
                'code' => 400,
                'error' => $validation->errors()->all(),
            ];
        } else {
            try {
                $createData = Sticker::create([
                    'name' => $request->name,
                    'image' => $request->file('image')->store('public/sticker'),
                    'price' => $request->price,
                    'bank' => $request->bank,
                    'account_number' => $request->account_number
                ]);

                $response = [
                    'code' => 200,
                    'message' => 'Data telah ditambahkan'
                ];
            } catch (\Exception $e) {
                $response = [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ];
            }
        }

        return response()->json($response);
    }

    public function showData(Request $request)
    {
        $id = $request->id;
        $data = Sticker::findOrFail($id);

        return response()->json($data);
    }

    public function updateData(Request $request)
    {
        $id = $request->table_id;
        $validation = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'name' => 'required',
            'price' => 'required'
        ], [
            'image.image' => 'gambar tidak tidak valid',
            'image.mimes' => 'gambar harus ekstensi PNG, JPG, JPEG',
            'name.required' => 'nama tidak boleh kosong',
            'price.required' => 'harga tidak boleh kosong'
        ]);

        if ($validation->fails()) {
            $response = [
                'code' => 400,
                'error' => $validation->errors()->all(),
            ];
        } else {
            try {
                $updateData = Sticker::findOrFail($id);
                $image = $updateData->image;

                if ($request->hasFile('image')) {
                    if (Storage::exists($updateData->image)) {
                        Storage::delete($updateData->image);
                    }

                    $image = $request->file('image')->store('public/sticker');
                }

                $updateData->update([
                    'name' => $request->name,
                    'image' => $image,
                    'price' => $request->price,
                    'bank' => $request->bank,
                    'account_number' => $request->account_number
                ]);

                $response = [
                    'code' => 200,
                    'message' => 'Data telah diubah'
                ];
            } catch (\Exception $e) {
                $response = [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage()
                ];
            }
        }

        return response()->json($response);
    }

    public function destroyData(Request $request)
    {
        $id = $request->id;

        try {
            Sticker::destroy($id);

            $response = [
                'code' => 200,
                'message' => 'Data telah dihapus'
            ];
        } catch (\Exception $e) {
            $response = [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response);
    }
}
