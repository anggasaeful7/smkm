@extends('layouts.admin')

@section('title')
    Data Pendaftarans
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i class="fa fa-th-list"></i><i
                                        data-feather="arrow-right"></i></div>
                                Data Pendaftar
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
                        <div class="card-header bg-green text-white">
                            Data Pendaftar:
                        </div>
                        <div class="card-body">
                            {{-- Alert --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{-- List Data --}}
                            <div class="table table-responsive">
                                <table class="table table-striped table-hover table-sm" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($query as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->daftarkegiatan->nama_kegiatan }}</td>
                                                <td>
                                                    <form action="{{ route('data-pendaftaran.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Anda akan menghapus item ini dari situs anda?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-xs">
                                                            <i class="far fa-trash-alt"></i> &nbsp; Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
