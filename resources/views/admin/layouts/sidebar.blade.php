<div class="page-content">
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
        <div class="sidebar-content pt-3">
            <div class="sidebar-section">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header pt-0">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Navigasi</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/home') }}" class="nav-link {{ Request::segment(2) == 'home' ? 'active' : '' }}">
                            <i class="ph-house"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/printing') }}" class="nav-link {{ Request::segment(2) == 'printing' ? 'active' : '' }}">
                            <i class="ph-printer"></i>
                            <span>Percetakan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/sticker') }}" class="nav-link {{ Request::segment(2) == 'sticker' ? 'active' : '' }}">
                            <i class="ph-image"></i>
                            <span>Stiker</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/category') }}" class="nav-link {{ Request::segment(2) == 'category' ? 'active' : '' }}">
                            <i class="ph-list-bullets"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/product') }}" class="nav-link {{ Request::segment(2) == 'product' ? 'active' : '' }}">
                            <i class="ph-archive"></i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/transaction') }}" class="nav-link {{ Request::segment(2) == 'transaction' ? 'active' : '' }}">
                            <i class="ph-shopping-cart"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/recap') }}" class="nav-link {{ Request::segment(2) == 'recap' ? 'active' : '' }}">
                            <i class="ph-book"></i>
                            <span>Rekap</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/user') }}" class="nav-link {{ Request::segment(2) == 'user' ? 'active' : '' }}">
                            <i class="ph-users"></i>
                            <span>User</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="content-inner">
