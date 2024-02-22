@extends('layouts.admin')

@section('title')
Detail Kegiatan
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fa fa-th-list"></i></div>
                            Detail Kegiatan
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali Ke Semua Kegiatan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="row gx-4">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header bg-green text-white">Detail Kegiatan</div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Tanggal Pelaksanaan</th>
                                        <td>{{ Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Organisasi</th>
                                        <td>{{ $item->department->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kegiatan</th>
                                        <td>{{ $item->nama_kegiatan }}</td>                                    </tr>
                                    <tr>
                                    <tr>
                                        <th>Jenis Kegiatan</th>
                                        <td>{{ $item->jeniskegiatan->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $item->deskripsi }}</td>                                    </tr>
                                    <tr>
                                        <th>Ruangan</th>
                                        <td>{{ $item->ruangan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header bg-green text-white">
                        Flayer -
                        <a href="{{ route('download-flayer', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Flayer
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <embed src="{{ Storage::url($item->letter_file) }}" width="500" height="375" type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection