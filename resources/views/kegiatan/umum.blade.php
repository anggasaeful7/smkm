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
                                <div class="page-header-icon text-white"><i class="fas fa-home"></i><i
                                        data-feather="arrow-right"></i></div>
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
                @foreach ($query as $data)
                    <div class="col-lg-3" >
                        <div class="card card-header-actions mb-4">
                            <div class="card-header bg-green text-white d-flex justify-content-center">
                                    {{ $data->nama_kegiatan }}
                            </div>
                            <img src="{{ Storage::url( $data->letter_file) }}" width="18rem"  class="card-img-top " alt="...">
                            <div class="card-body d-flex justify-content-center text-center">
                                <div class="">
                                    <h5 class="card-title">{{ $data->nama_kegiatan }}</h5>
                                    <p class="card-text">{{ $data->tanggal_pelaksanaan }}</p>
                                    <p class="card-text">{{ $data->department->name }}</p>
                                    <a href="{{ route('detail-kegiatan-umum', $data->id) }}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>
@endsection
