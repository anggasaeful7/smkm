@extends('layouts.admin')

@section('title')
    Ubah Surat Disposisi
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-white border-bottom bg-green mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                                Tambah Surat Disposisi
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('surat-disposisi') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Surat Disposisi
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
            <form action="{{ route('disposisi.update', $letter->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header bg-green text-white">Form Data Persetujuan <span style="color: red;"> * Harus
                                    diisi</span></div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="letter_id" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control @error('letter_id') is-invalid @enderror"
                                            name="letter_id" value="{{ old('letter_id', $letter->id) }}">

                                    </div>
                                    @error('letter_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="catatan_rektors" class="col-sm-3 col-form-label">Nama Proposal</label>
                                    <div class="col-sm-9">
                                        <input id="catatan_rektors" class="form-control @error('catatan_rektor') is-invalid @enderror" name="catatan_rektor"
                                            placeholder="Nama Proposal.." value="{{$letter->letter_no}}" required disabled />
                                    </div>
                                    @error('catatan_rektor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="lampiran" class="col-sm-3 col-form-label">File Proposal</label>
                                    <div class="col-sm-9">
                                        <a href="{{ route('download-surat', $letter->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Surat
                                        </a>
                                    </div>
                                    @error('lampiran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-3 col-form-label">Status Pengajuan</label>
                                    <div class="col-sm-9 row" style="float: right;">
                                        <div class="col-sm-4">
                                            <input type="checkbox" value="Setuju" name="status[]"
                                                {{ $item->status == 'Setuju' ? 'checked' : '' }}> Setuju <br>
                                            <input type="checkbox" value="Tolak" name="status[]"
                                                {{ $item->status == 'Tolak' ? 'checked' : '' }}> Tolak <br>
                                            <input type="checkbox" value="Revisi" name="status[]"
                                                {{ $item->status == 'Revisi' ? 'checked' : '' }}> Revisi <br>
                                        </div>
                                    </div>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="catatan_rektors" class="col-sm-3 col-form-label">Catatan Kemahasiswaan</label>
                                    <div class="col-sm-9">
                                        <textarea id="catatan_rektors" class="form-control @error('catatan_rektor') is-invalid @enderror" name="catatan_rektor"
                                            placeholder="Catatan Kemahasiswaan.." required>{{ $item->catatan_rektor }}</textarea>
                                    </div>
                                    @error('catatan_rektor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header text-white bg-green">Form Persetujuan Pendanaan <span style="color: red;">
                                    * Harus diisi</span></div>
                            <div class="card-body">
                            <div class="mb-3 row">
                                    <label for="catatan_rektors" class="col-sm-3 col-form-label">Nominal Pengajuan</label>
                                    <div class="col-sm-9">
                                    <input id="catatan_rektors" class="form-control @error('catatan_rektor') is-invalid @enderror" name="catatan_rektor"
                                            placeholder="Nominal yang diajukan.." value="{{$letter->nominal}}" required disabled />
                                    </div>
                                    @error('catatan_rektor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                <label for="nominal" class="col-sm-3 col-form-label">Nominal yang Disetujui</label>
                                        <div class="col-sm-9">
                                            <input type="number" 
                                                class="form-control @error('nominal') is-invalid @enderror" 
                                                value="{{ old('nominal') }}" 
                                                name="nominal" 
                                                placeholder="Masukkan Nominal Pengajuan (Contoh: 1000000)" 
                                                title="Masukkan angka bulat sebagai Nominal Pengajuan" 
                                                step="1" 
                                                required>
                                        </div>
                                        @error('nominal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                <div class="mb-3 row">
                                    <label for="tertulis" class="col-sm-3 col-form-label">Tertulis</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('tertulis') is-invalid @enderror"
                                            value="{{ $item->tertulis }}" name="tertulis" placeholder="tertulis..">
                                    </div>
                                    @error('tertulis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
