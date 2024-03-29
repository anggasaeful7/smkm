@extends('layouts.admin')

@section('title')
Ubah Kegiatan
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fas fa-home"></i></div>
                            Ubah Data Kegiatan
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali
                        </button>
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
        <form action="{{ route('daftarkegiatan.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header bg-green text-white">Form Kegiatan</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="letter_type" class="col-sm-3 col-form-label">Jenis Data</label>
                                <div class="col-sm-9">
                                    <select name="letter_type" class="form-control" required>
                                        <option value="Daftar Kegiatan" {{ ($item->letter_type == 'Daftar Kegiatan')? 'selected':''; }}>Daftar Kegiatan</option>
                                    </select>
                                </div>
                                @error('letter_type')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_pelaksanaan" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror" value="{{ old('tanggal_pelaksanaan',$item->tanggal_pelaksanaan) }}" name="tanggal_pelaksanaan" required>
                                </div>
                                @error('tanggal_pelaksanaan')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">Nama Organisasi</label>
                                <div class="col-sm-9">
                                    <select name="department_id" class="form-control selectx" >
                                        <option value="">Pilih Organisasi Mahasiswa..</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ ($item->department_id == $department->id)? 'selected':''; }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('department_id')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" value="{{ $item->nama_kegiatan }}" name="nama_kegiatan" placeholder="Nama Kegiatan.." required>
                                </div>
                                @error('nama_kegiatan')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="jeniskegiatan_id" class="col-sm-3 col-form-label">Jenis Kegiatan</label>
                                <div class="col-sm-9">
                                    <select name="jeniskegiatan_id" class="form-control selectx" required>
                                        <option value="">Pilih Jenis Kegiatan..</option>
                                        @foreach ($jeniskegiatans as $jeniskegiatan)
                                        <option value="{{ $jeniskegiatan->id }}" {{ ($item->jeniskegiatan_id == $jeniskegiatan->id)? 'selected':''; }}>{{ $jeniskegiatan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('jeniskegiatan_id')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deksripsi Kegiatan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                                name="deskripsi" placeholder="Masukan Deskripsi dan Informasi Penting (Termasuk SKKM).." required>{{ old('deskripsi') }}</textarea>
                                    </div>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                  </div>
                            <div class="mb-3 row">
                                <label for="ruangan" class="col-sm-3 col-form-label">Ruangan Kegiatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('ruangan') is-invalid @enderror" value="{{ $item->ruangan }}" name="ruangan" placeholder="Ruangan Kegiatan.." required>
                                </div>
                                @error('ruangan')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('letter_file') is-invalid @enderror" value="{{ old('letter_file') }}" name="letter_file">
                                    <div id="letter_file" class="form-text">Ekstensi .JPG,PNG,JPEG | Size 1080x1080px (Kosongkan Jika Tidak Ada Perubahan)</div>
                                </div>
                                @error('letter_file')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
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