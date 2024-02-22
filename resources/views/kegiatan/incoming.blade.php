@extends('layouts.admin')

@section('title')
Daftar Kegiatan
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fas fa-home"></i><i data-feather="arrow-right"></i></div>
                            Data Kegiatan
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
                        Data Kegiatan:
                        <div>
                            @can('only admin')
                                
                            <a class="btn btn-sm btn-warning" href="{{ route('kegiatan.create') }}">
                                <i data-feather="plus-square"></i> &nbsp;
                                Tambah Kegiatan
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Alert --}}
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
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
                        {{-- List Data --}}
                        <div class="table table-responsive">
                            <table class="table table-striped table-hover table-sm" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Nama Organisasi</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Deksripsi</th>
                                        <th>Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('addon-script')
<script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                "data": 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'tanggal_pelaksanaan',
                name: 'tanggal_pelaksanaan',
                width: '10%'
            },
            {
                data: 'department.name',
                name: 'department.name'
            },
            {
                data: 'nama_kegiatan',
                name: 'nama_kegiatan'
            },
            {
                data: 'jeniskegiatan.name',
                name: 'jeniskegiatan.name'
            },
            {
                data: 'deskripsi',
                name: 'deskripsi'
            },
            {
                data: 'ruangan',
                name: 'ruangan'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searcable: true,
                width: '15%'
            },
        ]
    });
</script>
@endpush