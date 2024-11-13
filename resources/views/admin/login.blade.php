
<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Kolaboreka</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}">
	<link href="{{ asset('template/backoffice/assets/fonts/inter/inter.css') }}" rel="stylesheet">
	<link href="{{ asset('template/backoffice/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/backoffice/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet">
	<link href="{{ asset('template/backoffice/custom.css') }}" id="stylesheet" rel="stylesheet">
	<script src="{{ asset('template/backoffice/assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('template/backoffice/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('template/backoffice/assets/js/app.js') }}"></script>
</head>
<body>
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content-inner">
				<div class="content d-flex justify-content-center align-items-center">
					<form class="login-form" method="POST">
                        @csrf
						<div class="card mb-0">
							<div class="card-body">
                                <div class="text-center mb-3">
                                    <h5 class="mb-0">Masuk ke akun Anda</h5>
                                    <span class="d-block text-muted">Masukkan kredensial Anda di bawah ini</span>
                                </div>
                                @if(session('success'))
                                    <div class="alert bg-success text-white fade show text-center">
                                        {{ session('success') }}
                                    </div>
                                @elseif(session('failed'))
                                    <div class="alert bg-danger text-white fade show text-center">
                                        {{ session('failed') }}
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                                </div>
                            </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
