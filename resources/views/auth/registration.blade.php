@extends('auth.layout')

@section('title', 'Pendaftaran - ' . env('APP_NAME'))

@section('content')

<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <!-- Basic Pendaftaran form-->
            <div class="card shadow-lg border-0 rounded-lg mt-3">
                <div class="card-header justify-content-center">
                    <h3 class="fw-light my-4 text-center">Pendaftaran</h3>
                </div>
                <div class="card-body">

                    <!--  Pendaftaran form-->
                    <form action="{{ url('registration-process') }}" method="post">
                        @csrf

                        <!-- Form Group (name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nama Lengkap</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                type="text" placeholder="Masukkan nama lengkap" required maxlength="50"
                                autocomplete="off" value="{{ old('name') }}" />

                            @if ($errors->has('name'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('name'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                type="email" placeholder="Masukkan email" required autocomplete="off"
                                value="{{ old('email') }}" />

                            @if ($errors->has('email'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('email'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (password)-->
                        <div class="mb-4 position-relative">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control passwordField @error('password') is-invalid @enderror"
                                id="password" name="password" type="password" placeholder="Minimal 10 karakter" required
                                value="{{ old('password') }}" />

                            <i class="bi bi-eye-slash-fill password-icon" style="display: block;"></i>
                            <i class="bi bi-eye-fill password-icon" style="display: none;"></i>

                            @if ($errors->has('password'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (password confirmation)-->
                        <div class="mb-4 position-relative">
                            <label class="small mb-1" for="password_confirmation">Konfirmasi Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" type="password"
                                placeholder="Masukkan konfirmasi password" required
                                value="{{ old('password_confirmation') }}" />

                            <i class="bi bi-eye-slash-fill password-icon" style="display: block;"></i>
                            <i class="bi bi-eye-fill password-icon" style="display: none;"></i>

                            @if ($errors->has('password_confirmation'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password_confirmation'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (daftar box)-->
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-dark float-end btn-submit">Daftar</button>

                            <button class="btn btn-dark d-none btn-loading-submit float-end" type="button" disabled>
                                <span class="spinner-border spinner-border-sm me-1" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="{{ url('login') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection