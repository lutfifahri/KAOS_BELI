<div class="page-header page-header-light border rounded mb-3">
    <div class="page-header-content d-flex">
        <div class="page-title">
            <h5 class="mb-0">
                <span class="fw-normal">Transaksi</span>
            </h5>
        </div>
        <div class="my-auto ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-teal dropdown-toggle" data-bs-toggle="dropdown">Refresh</button>
                <div class="dropdown-menu">
                    <a href="javascript:void(0);" class="dropdown-item" onclick="onReloadTable()">Data</a>
                    <a href="{{ url()->full() }}" class="dropdown-item">Halaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content pt-0">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped table-xs display" id="datatable-serverside">
                <thead class="text-bg-dark">
                    <tr>
                        <th class="text-center" nowrap>No</th>
                        <th nowrap>Nomor</th>
                        <th nowrap>Customer</th>
                        <th nowrap>Email</th>
                        <th nowrap>Telepon</th>
                        <th nowrap>Tanggal</th>
                        <th class="text-center" nowrap><i class="ph-gear"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div id="modal-form" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                    <i class="ph-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nomor</th>
                        <td width="1%">:</td>
                        <td id="d-number"></td>
                        <th>Email</th>
                        <td width="1%">:</td>
                        <td id="d-email"></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td width="1%">:</td>
                        <td id="d-name"></td>
                        <th>Phone</th>
                        <td width="1%">:</td>
                        <td id="d-phone"></td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td width="1%">:</td>
                        <td id="d-city"></td>
                        <th>Alamat</th>
                        <td width="1%">:</td>
                        <td id="d-address"></td>
                    </tr>
                </table>
                <table class="table table-bordered mt-5" id="transaction-detail">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">Gambar</th>
                            <th>Percetakan</th>
                            <th>Kategori</th>
                            <th>Harga Produk</th>
                            <th>Stiker</th>
                            <th>Harga Stiker</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                        <tbody></tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th colspan="7">TOTAL KESELURUHAN</th>
                                <th id="d-grandtotal"></th>
                            </tr>
                        </tfoot>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        loadData();
        sidebarMini();
    });

    function loadData() {
        window.gDataTable = $('#datatable-serverside').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            scrollX: true,
            destroy: true,
            order: [[0, 'desc']],
            ajax: {
                url: '{{ url("admin/transaction/datatable") }}',
                dataType: 'JSON',
                beforeSend: function() {
                    onLoading('show', '.datatable-scroll');
                },
                complete: function() {
                    onLoading('close', '.datatable-scroll');
                },
                error: function(response) {
                    onLoading('close', '.datatable-scroll');

                    swalInit.fire({
                        html: '<b>' + response.responseJSON.exception + '</b><br>' + response.responseJSON.message,
                        icon: 'error',
                        showCloseButton: true
                    });
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id', orderable: true, searchable: false, className: 'align-middle text-center' },
                { data: 'number', name: 'number', orderable: true, searchable: true, className: 'align-middle' },
                { data: 'name', name: 'name', orderable: true, searchable: true, className: 'align-middle' },
                { data: 'email', name: 'email', orderable: true, searchable: true, className: 'align-middle' },
                { data: 'phone', name: 'phone', orderable: true, searchable: true, className: 'align-middle' },
                { data: 'created_at', name: 'created_at', orderable: true, searchable: false, className: 'align-middle' },
                { data: 'action', name: 'action', orderable: false, searchable: false, className: 'align-middle text-center' },
            ]
        });
    }

    function showData(id) {
        $.ajax({
            url: '{{ url("admin/transaction/show-data") }}',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id
            },
            beforeSend: function() {
                onLoading('show', '.modal-content');
                $('#modal-form').modal('show');
                $('#transaction-detail tbody').html('');
            },
            success: function(response) {
                onLoading('close', '.modal-content');

                $('#d-number').html(response.number);
                $('#d-name').html(response.name);
                $('#d-city').html(response.city);
                $('#d-email').html(response.email);
                $('#d-phone').html(response.phone);
                $('#d-address').html(response.address);

                var grandtotal = 0;
                $.each(response.transaction_detail, function(i, val) {
                    var total = parseFloat(val.price_product) + (parseFloat(val.price_sticker) * parseInt(val.qty));
                    grandtotal += parseFloat(total);

                    $('#transaction-detail tbody').append(`
                        <tr>
                            <td class="text-center">
                                <a href="` + val.image_url + `" target="_blank">
                                    <img src="` + val.image_url + `" class="img img-thumbnail" style="max-width:70px;">
                                </a>
                            </td>
                            <td>` + val.product.printing.name + `</td>
                            <td>` + val.product.category.name + `</td>
                            <td>` + $.number(val.price_product, 0, '.', '.') + `</td>
                            <td>` + val.sticker.name + `</td>
                            <td>` + $.number(val.price_sticker, 0, '.', '.') + `</td>
                            <td>` + val.qty + `</td>
                            <td>` + $.number(total, 0, '.', '.') + `</td>
                        </tr>
                    `);
                });

                $('#d-grandtotal').html($.number(grandtotal, 0, '.', '.'));
            },
            error: function(response) {
                onLoading('close', '.modal-content');

                swalInit.fire({
                    html: '<b>' + response.responseJSON.exception + '</b><br>' + response.responseJSON.message,
                    icon: 'error',
                    showCloseButton: true
                });
            }
        });
    }
</script>
