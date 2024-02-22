@extends('layouts.admin')

@section('title')
    Surat Disposisi
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-white">
                                <div class="page-header-icon text-white"><i data-feather="mail"></i></div>
                                Data Surat Disposisi
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
                            Data :
                            <div>
                                <a class="btn btn-sm btn-white" href="{{ route('print-surat-disposisi') }}" target="_blank">
                                    <i data-feather="printer"></i> &nbsp;
                                    Cetak Laporan
                                </a>
                            </div>

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
                                <table class="table table-striped table-hover table-sm table-responsive" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th width="10">No.</th>
                                            <th>No.Surat</th>
                                            <th>Status</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Nominal</th>
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
                    data: 'letter.letter_no',
                    name: 'letter.letter_no'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        switch (data) {
                            case 'Setuju':
                                return '<span class="badge bg-success">Setuju</span>';
                            case 'Tolak':
                                return '<span class="badge bg-danger">Tolak</span>';
                            case 'Revisi':
                                return '<span class="badge bg-warning">Revisi</span>';
                            default:
                                return data;
                        }
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'nominal',
                    name: 'nominal'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
