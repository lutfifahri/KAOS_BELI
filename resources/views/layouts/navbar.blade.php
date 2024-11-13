<body class="stretched">
	<div id="wrapper" class="clearfix">
		<header id="header" class="page-section header-size-sm">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row p-2">
						<div id="logo">
							<a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ url('assets/logo.png') }}">
                                <img src="{{ url('assets/logo.png') }}" style="max-width:70px; max-height:70px;">
                            </a>
							<a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ url('assets/logo.png') }}">
                                <img src="{{ url('assets/logo.png') }}" style="max-width:70px; max-height:70px;">
                            </a>
						</div>
						<nav class="primary-menu">
							<ul class="menu-container one-page-menu">
								<li class="menu-item {{ Request::segment(1) == '' ? 'current' : '' }}">
                                    <a class="menu-link" href="{{ url('/') }}">
                                        <div>Beranda</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::segment(1) == 'cart' ? 'current' : '' }}">
                                    <a class="menu-link" href="{{ url('cart') }}">
                                        <div>Keranjang Belanja</div>
                                    </a>
                                </li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header>
