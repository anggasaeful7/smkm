@extends('layouts.auth')

@section('main')
<main>
    <div class="container-xl px-4 ">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- Basic login form-->
                <div class="card border-0 rounded-lg mt-5" id="shadow-login">
                    <!-- <div class="card-header justify-content-center">

                    </div> -->
                    <br>
                    <h3 class="fw-light text-center mt-3"><b>REGISTER SMKM</b></h3>
                    <h3 class="fw-light text-center mb-3"><b>SEKOLAH TINGGI TEKNOLOGI BANDUNG</b></h3>
                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="/admin/assets/img/sttb.png" style="max-width: 11rem"/></div>
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <!-- Login form-->
                        <form action="/register" method="post" class="container">
                            @csrf
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="nama">Nama</label>
                                <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="name" type="nama" value="{{ old('nama') }}" placeholder="Enter nama" autofocus required />
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Enter email address" autofocus required />
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message; }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter password" required />
                            </div>
                            <!-- Form Group (remember password checkbox)-->
                            <!-- Form Group (login box)-->
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="#">

                                </a>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection