<section id="page-title">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
        </ol>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container">
            @if($cart->count() > 0)
                @if(session('success'))
                    <div class="alert alert-success mb-5">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ url('cart/update-or-checkout') }}" method="POST">
                    @csrf
                    <table class="table cart mb-5">
                        <thead>
                            <tr>
                                <th class="cart-product-remove">&nbsp;</th>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Produk</th>
                                <th class="cart-product-name">Stiker</th>
                                <th class="cart-product-quantity">Jumlah</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                                $totalQty = 0;
                            @endphp
                            @foreach($cart as $c)
                                @php
                                    $qty = $c->qty;
                                    $total = $c->product->price + ($c->sticker->price * $qty);
                                    $subtotal += $total;
                                    $totalQty += $qty;
                                @endphp
                                <input type="hidden" name="id[]" value="{{ $c->id }}">
                                <input type="hidden" name="product_id[]" value="{{ $c->product_id }}">
                                <input type="hidden" name="sticker_id[]" value="{{ $c->product_id }}">
                                <tr class="cart_item">
                                    <td class="cart-product-remove">
                                        <a href="{{ url('cart/delete/' . $c->id) }}" class="remove" title="Remove this item">
                                            <i class="icon-trash2"></i>
                                        </a>
                                    </td>
                                    <td class="cart-product-thumbnail">
                                        <a href="{{ $c->image() }}" target="_blank">
                                            <img width="64" height="64" src="{{ $c->image() }}">
                                        </a>
                                    </td>
                                    <td class="cart-product-name">
                                        <a href="javascript:void(0);" style="pointer-events:none;">
                                            {{ $c->product->category->name }} |
                                            {{ $c->product->printing->name }} |
                                            Rp {{ number_format($c->product->price, 0, '.', '.') }}
                                        </a>
                                    </td>
                                    <td class="cart-product-name">
                                        <a href="javascript:void(0);" style="pointer-events:none;">
                                            {{ $c->sticker->name }} |
                                            Rp {{ number_format($c->sticker->price, 0, '.', '.') }}
                                        </a>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="qty[]" value="{{ $qty }}" class="qty">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">
                                        <span class="amount">Rp {{ number_format($total, 0, '.', '.') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row col-mb-30">
                        <div class="col-lg-12">
                            <h4>Ringkasan</h4>
                            <div class="table-responsive">
                                <table class="table cart cart-totals">
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>Jumlah Keseluruhan</strong>
                                            </td>
                                            <td class="cart-product-name">
                                                <span class="amount">{{ $totalQty }} Item</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="cart-product-name">
                                                <span class="amount color lead">
                                                    <strong>Rp {{ number_format($subtotal, 0, '.', '.') }}</strong>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4>Form Transaksi</h4>
                            <div class="mb-3">
                                <label>Nama :</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>No Telp :</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kota :</label>
                                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Alamat :</label>
                                <textarea class="form-control" name="address" id="address" style="resize:none;" required>{{ old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="button col-12" name="submit" value="update">Perbarui Keranjang Belanja</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="button col-12" name="submit" value="checkout">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-info">
                    Keranjang belanja anda masih kosong, silahkan menambahkan produk di <a href="{{ url('/') }}">sini</a>
                </div>
            @endif
        </div>
    </div>
</section>
