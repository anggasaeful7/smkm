@extends('layouts.admin')

@section('title')
    Filter Jenis
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i class="fas fa-address-book"></i></div>
                                Presensi Kegiatan
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header-actions mb-4">
                        <div class="card-header bg-success text-white">
                            Pilih Presensi
                        </div>
                        <div class="card-body">
                            {{-- ... (Bagian lain dari konten seperti tabel dan modal) --}}
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <a class="btn btn-sm btn-warning me-5" href="{{ route('presensi.presensimahasiswa', $id) }}">
                                Presensi Mahasiswa
                            </a>
                            <!-- Tambah button untuk presensi umum -->
                            <a class="btn btn-sm btn-info" href="{{ route('presensi.presensiumum', $id) }}">
                                Presensi Umum
                            </a>
                        </div>
                        <div class="card-body">
                            {{-- ... (Bagian lain dari konten seperti tabel dan modal) --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
