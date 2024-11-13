<body>
	<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
		<div class="container-fluid">
			<div class="d-flex d-lg-none me-2">
				<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
					<i class="ph-list"></i>
				</button>
			</div>
			<div class="navbar-brand flex-1 flex-lg-0">
				<a href="{{ url('admin/dashboard') }}" class="d-inline-flex align-items-center">
                    KOLABOREKA ADMIN PANEL
				</a>
			</div>
			<ul class="nav flex-row">
				<li class="nav-item d-lg-none">
					<a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="collapse">
						<i class="ph-magnifying-glass"></i>
					</a>
				</li>
			</ul>
			<ul class="nav flex-row justify-content-end order-1 order-lg-2">
				<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/user.png') }}" class="w-32px h-32px rounded-pill">
                        <span class="d-none d-lg-inline-block mx-lg-2">{{ auth()->user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a href="{{ url('admin/auth/profile') }}" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							Profil
						</a>
						<a href="{{ url('admin/auth/change-password') }}" class="dropdown-item">
							<i class="ph-lock me-2"></i>
							Ganti Password
						</a>
						<a href="{{ url('admin/auth/logout') }}" class="dropdown-item">
							<i class="ph-sign-out me-2"></i>
							Keluar
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
