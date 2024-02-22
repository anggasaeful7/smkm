@extends('layouts.admin')

@section('title')
Submit Link Sertifikat
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-green mb-4">
    <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i class="fas fa-upload"></i><i data-feather="arrow-right"></i></div>
                            Submit Sertifikat
                        </h1>
                    </div>
                </div>
            </div>
        </div>
</header>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header bg-green text-white">Submit Sertifikat</div>
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
                <form action="{{ route('sertifikat.store') }}" method="post">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="mb-3 row">
                            <label for="user_id" class="col-sm-3 col-form-label">Submit Link</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="text" class="form-control" name="sertifikat" placeholder="Masukan Link Sertifikat Kegiatan.." required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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