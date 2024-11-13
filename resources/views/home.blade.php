<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            @if(session('success'))
                <div class="alert alert-success mb-5">
                    {{ session('success') }}
                </div>
            @endif
            @if($sticker->count() > 0)
                <div id="shop" class="shop row grid-container col-mb-30 gutter-30" data-layout="fitRows">
                    @foreach($sticker as $s)
                        <div class="product col-12 col-sm-6 col-lg-12">
                            <div class="grid-inner row g-0">
                                <div class="product-image col-lg-4 col-xl-3">
                                    <a href="javascript:void(0);" style="pointer-events:none;">
                                        <img src="{{ $s->image() }}" alt="{{ $s->name }}">
                                    </a>
                                </div>
                                <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                                    <div class="product-title">
                                        <h3>
                                            <a href="javascript:void(0);" style="pointer-events:none;">{{ $s->name }}</a>
                                        </h3>
                                    </div>
                                    <div class="product-price">
                                        <ins>Rp {{ number_format($s->price, 0, '.', '.') }}</ins>
                                    </div>
                                    <p class="mt-3 d-none d-lg-block">
                                        <form action="{{ url('add-to-cart') }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="sticker_id" value="{{ $s->id }}">
                                            <div class="row mb-2">
                                                <label class="col-sm-2 col-form-label">Produk</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="product_id" id="product_id" required>
                                                        @foreach($product as $p)
                                                            <option value="{{ $p->id }}">
                                                                {{ $p->category->name }} | {{ $p->printing->name }} | Rp {{ number_format($p->price, 0, '.', '.') }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <label class="col-sm-2 col-form-label">Jumlah</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="qty" id="qty" min="1" placeholder="Masukan jumlah" value="1" required>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <button type="submit" class="button col-12">Tambah Dikeranjang</button>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-5">
                        {{ $sticker->onEachSide(5)->links() }}
                    </div>
                </div>
            @else
                <div class="alert alert-info">Tidak ada stiker</div>
            @endif
        </div>
    </div>
</section>
