@extends('layouts.admin')

@section('title')
    Presensi Kegiatan
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i class="fas fa-address-book"></i></div>
                                Presensi Kegiatan
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('data-kegiatan') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Presensi
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
            <form action="{{ route('presensimahasiswa.submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header bg-green text-white">Form Kegiatan</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Peserta</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> 
                                        <input type="hidden"
                                            class="form-control @error('daftarkegiatan_id') is-invalid @enderror"
                                            name="daftarkegiatan_id" value="{{ $id }}" required>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}" name="nama" placeholder="Nama.." required>
                                    </div>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="npm_nidn" class="col-sm-3 col-form-label">NPM/NIDN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('npm_nidn') is-invalid @enderror"
                                            value="{{ old('npm_nidn') }}" name="npm_nidn" placeholder="Npm/Nidn.." required>
                                    </div>
                                    @error('npm_nidn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="prodi_id" class="col-sm-3 col-form-label">Program Studi</label>
                                    <div class="col-sm-9">
                                        <select name="prodi_id" class="form-control" required>
                                            <option value="">Pilih Jenis...</option>
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}"
                                                    {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('prodi_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_file" class="col-sm-3 col-form-label">Bukti Kehadiran</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('letter_file') is-invalid @enderror"
                                            value="{{ old('letter_file') }}" name="letter_file" required>
                                        <div id="letter_file" class="form-text">Ekstensi .JPG,PNG,JPEG | <span
                                                style="color: blue;"> * Harus diisi</span></div>
                                    </div>
                                    @error('letter_file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="window.location.href='{{ route('data-kegiatan') }}'">Submit</button>
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
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
