<div class="page-header page-header-light border rounded mb-3">
    <div class="page-header-content d-flex">
        <div class="page-title">
            <h5 class="mb-0">
                <span class="fw-normal">Rekap</span>
            </h5>
        </div>
        <div class="my-auto ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-teal dropdown-toggle" data-bs-toggle="dropdown">Refresh</button>
                <div class="dropdown-menu">
                    <a href="{{ url()->full() }}" class="dropdown-item">Halaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content pt-0">
    <div class="card">
        <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
            <h6 class="py-sm-3 mb-sm-0">Rekap Pembyaran</h6>
            <div class="ms-sm-auto my-sm-auto">
                <form>
                    <input type="date" class="form-control wmin-200" name="date" value="{{ $date ? $date : date('Y-m-d') }}" onchange="this.form.submit()">
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-xs display" id="">
                <thead class="text-bg-dark">
                    <tr>
                        <th class="text-center" nowrap>No</th>
                        <th nowrap>Stiker</th>
                        <th nowrap>Jumlah</th>
                        <th nowrap>Total Yang Dibayar</th>
                    </tr>
                </thead>
                @if($sticker->count() > 0)
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($sticker as $key => $s)
                            @php
                                $totalPrice = $s->transactionDetail()->whereDate('created_at', $date)->sum('price_sticker');
                                $totalQty = $s->transactionDetail()->whereDate('created_at', $date)->sum('qty');
                                $subtotal = $totalPrice * $totalQty;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $totalQty }}</td>
                                <td>{{ number_format($subtotal, 0, '.', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <th colspan="3">TOTAL KESELURUHAN</th>
                            <th>{{ number_format($total, 0, '.', '.') }}</th>
                        </tr>
                    </tfoot>
                @else
                    <tbody>
                        <tr class="bg-light">
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
