@extends('layouts.admin')

@section('title')
    Filter Kegiatan
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i class="fas fa-table"></i><i
                                        data-feather="arrow-right"></i></div>
                                Data Pendaftar
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header bg-green text-white">Data Pendaftar</div>
                <div class="card-body">
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

                    <form action="{{ route('filter.kegiatan') }}" method="post">
                        @csrf
                        <div class="row gx-4">
                            <div class="col-lg-9">
                                <div class="mb-3 row">
                                    <label for="department_id" class="col-sm-3 col-form-label">Nama Organisasi</label>
                                    <div class="col-sm-9">
                                        <select name="department_id" class="form-control" required>
                                            <option value="">Pilih Departemen...</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="jeniskegiatan_id" class="col-sm-3 col-form-label">Jenis Kegiatan</label>
                                    <div class="col-sm-9">
                                        <select name="jeniskegiatan_id" class="form-control" required>
                                            <option value="">Pilih Jenis...</option>
                                            @foreach ($jeniskegiatan as $jeniskegiatan)
                                                <option value="{{ $jeniskegiatan->id }}"
                                                    {{ old('jeniskegiatan_id') == $jeniskegiatan->id ? 'selected' : '' }}>
                                                    {{ $jeniskegiatan->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('jeniskegiatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="daftarkegiatans_id" class="col-sm-3 col-form-label">Daftar Kegiatan</label>
                                    <div class="col-sm-9">
                                        <select name="daftarkegiatans_id" class="form-control" required>
                                            <option value="">Pilih Daftar Kegiatan...</option>
                                            @foreach ($daftarkegiatans as $daftarkegiatan)
                                                <option value="{{ $daftarkegiatan->id }}"
                                                    {{ old('daftarkegiatans_id') == $daftarkegiatan->id ? 'selected' : '' }}>
                                                    {{ $daftarkegiatan->nama_kegiatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('daftarkegiatans_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
