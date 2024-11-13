<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Profil</h5>
                    </div>
                    <div class="card-body border-top">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif(session('success'))
                            <div class="alert bg-success text-white fade show text-center">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert bg-danger text-white fade show text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Nama <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Username <span class="text-danger fw-bold">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username" value="{{ old('username', $user->username) }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group mb-0">
                            <div class="text-end">
                                <button type="submit" class="btn btn-warning">
                                    <i class="ph-floppy-disk me-1"></i>
                                    Simpan Perubahan Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
