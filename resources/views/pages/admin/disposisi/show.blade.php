@extends('layouts.admin')

@section('title')
    Detail Surat
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                                Detail Status Proposal
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
            <div class="row gx-4">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header text-white bg-green">Detail Status Proposal</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Nama Proposal</th>
                                            <td>{{ $item->letter->letter_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pengajuan</th>
                                            <td>{{ Carbon\Carbon::parse($item->letter->letter_date)->translatedFormat('l, d F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ajukan SKKM</th>
                                            <td>{{ $item->letter->agenda_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>Penanggung Jawab</th>
                                            <td>{{ $item->letter->sender->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Target Pendaftar</th>
                                            <td>{{ $item->letter->regarding }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Pengajuan</th>
                                            <td>
                                                @if ($item->status === 'Setuju')
                                                    <span class="btn btn-success disabled">Setuju</span>
                                                @elseif($item->status === 'Tolak')
                                                    <span class="btn btn-danger disabled">Tolak</span>
                                                @elseif($item->status === 'Revisi')
                                                    <span class="btn btn-warning disabled">Revisi</span>
                                                @else
                                                    {{ $item->status }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Catatan Kemahasiswaan</th>
                                            <td>{{ $item->catatan_rektor }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Selesai</th>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header text-white bg-green">
                            File Proposal -
                            <a href="{{ route('download-surat', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Proposal
                            </a>
                        </div>

                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
