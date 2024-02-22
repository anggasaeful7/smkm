@extends('layouts.admin')

@section('title')
Tambah Kegiatan
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fas fa-table"></i></div>
                            Tambah Pendaftar
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('daftar-kegiatan') }}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali ke Semua Pendaftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ route('datapendaftar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header bg-green text-white">Form Pendaftar</div>
                        <div class="card-body">
                        <div class="mb-3 row">
                                <label for="audience_type" class="col-sm-3 col-form-label">Jenis Data</label>
                                <div class="col-sm-9">
                                    <select name="audience_type" class="form-control" required>
                                        <option value="Pendaftar" {{ (old('audience_type') == 'Pendaftar')? 'selected':''; }}>Pendaftar</option>
                                    </select>
                                </div>
                                @error('audience_type')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                        <div class="mb-3 row">
                                <label for="user_id" class="col-sm-3 col-form-label">Nama Pendaftar</label>
                                <div class="col-sm-9">
                                    <select name="user_id" class="form-control" required>
                                        <option value="">Masukan Nama Pendaftar...</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ (old('user_id') == $user->id)? 'selected':''; }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="npm_nidn" class="col-sm-3 col-form-label">NPM/NIDN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('npm_nidn') is-invalid @enderror" value="{{ old('npm_nidn') }}" name="npm_nidn" required>
                                </div>
                                @error('npm_nidn')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" value="{{ old('instansi') }}" name="instansi" required>
                                </div>
                                @error('instansi')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="jenisikutserta_id" class="col-sm-3 col-form-label">Jenis Ikutserta</label>
                                <div class="col-sm-9">
                                    <select name="jenisikutserta_id" class="form-control" required>
                                        <option value="">Pilih Jenis Ikutserta...</option>
                                        @foreach ($jenisikutserta as $jenisikutserta)
                                        <option value="{{ $jenisikutserta->id }}" {{ (old('jenisikutserta_id') == $jenisikutserta->id)? 'selected':''; }}>{{ $jenisikutserta->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('jenisikutserta_id')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".selectx").select2({
        theme: "bootstrap-5"
    });
</script>
@endpush