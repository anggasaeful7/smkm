@extends('layouts.admin')

@section('title')
Ubah Surat
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fas fa-book"></i></div>
                            Ubah Proposal Masuk
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
        <form action="{{ route('letter.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header bg-green text-white">Form Pengajuan Proposal</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="letter_type" class="col-sm-3 col-form-label">Jenis Propsal</label>
                                <div class="col-sm-9">
                                    <select name="letter_type" class="form-control" required>
                                        <option value="Surat Masuk" {{ ($item->letter_type == 'Surat Masuk')? 'selected':''; }}>Proposal Masuk</option>
                                    </select>
                                </div>
                                @error('letter_type')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_no" class="col-sm-3 col-form-label">Nama Proposal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('letter_no') is-invalid @enderror" value="{{ $item->letter_no }}" name="letter_no" placeholder="Masukan Nama Proposal (HURUF KAPITAL).." required>
                                </div>
                                @error('letter_no')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="letter_date" class="col-sm-3 col-form-label">Tanggal Pengajuan</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('letter_date') is-invalid @enderror" value="{{ old('letter_date',$item->letter_date) }}" name="letter_date" required>
                                </div>
                                @error('letter_date')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="agenda_no" class="col-sm-3 col-form-label">Ajukan SKKM</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('agenda_no') is-invalid @enderror" value="{{ $item->agenda_no }}" name="agenda_no" placeholder="Isi [ 0 ] jika tidak ada | Max 03 (Skala Acara Besar) .." required>
                                </div>
                                @error('agenda_no')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="regarding" class="col-sm-3 col-form-label">Target Pendaftar</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('regarding') is-invalid @enderror" value="{{ $item->regarding }}" name="regarding" placeholder="Masukan Jumlah Target Pendaftar.." required>
                                </div>
                                @error('regarding')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">Nama Organisasi</label>
                                <div class="col-sm-9">
                                    <select name="department_id" class="form-control selectx" required>
                                        <option value="">Pilih Organisasi...</option>
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
                                <label for="sender_id" class="col-sm-3 col-form-label">Penanggung Jawab</label>
                                <div class="col-sm-9">
                                    <select name="sender_id" class="form-control selectx" required>
                                        <option value="">Pilih Penanggung Jawab..</option>
                                        @foreach ($senders as $sender)
                                        <option value="{{ $sender->id }}" {{ ($item->sender_id == $sender->id)? 'selected':''; }}>{{ $sender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sender_id')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                    <label for="nominal" class="col-sm-3 col-form-label">Nominal Pengajuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                             name="nominal" value="{{ $item->nominal }}" placeholder="Masukan Nominal Pengajuan (Contoh:1.000.00)" required>
                                    </div>
                                    @error('nominal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            <div class="mb-3 row">
                                <label for="letter_file" class="col-sm-3 col-form-label">Lampirkan Proposal</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('letter_file') is-invalid @enderror" value="{{ old('letter_file') }}" name="letter_file">
                                    <div id="letter_file" class="form-text">Ekstensi .pdf | *Harus diisi</div>
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