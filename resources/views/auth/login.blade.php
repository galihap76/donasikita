@extends('auth.layout')

@section('title', 'Login - ' . env('APP_NAME'))

@section('content')

<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <!-- Basic login form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">

                    <h3 class="fw-light my-4 text-center">Login</h3>
                </div>


                <div class="card-body">

                    @if($success = Session::get('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ $success }}
                    </div>

                    @elseif($error = Session::get('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ $error }}
                    </div>

                    @elseif($status = Session::get('status'))
                    <div class="alert alert-success text-center" role="alert">
                        Reset password berhasil. Silakan login terlebih dahulu.
                    </div>

                    @endif

                    <!-- Login form-->
                    <form action="{{ url('login-process') }}" method="post">
                        @csrf

                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                type="text" placeholder="Masukkan email" required autocomplete="off"
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
                            <a class="small float-end" href="{{ url('forgot-password') }}">Lupa Password?</a>
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control passwordField @error('password') is-invalid @enderror"
                                id="password" name="password" type="password" placeholder="Masukkan password" required
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

                        <!-- Form Group (remember password checkbox)-->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox"
                                    name="remember" @if(old('remember')) checked @endif />
                                <label class="form-check-label" for="rememberPasswordCheck">Remember
                                    password</label>
                            </div>
                        </div>

                        <!-- Form Group (login box)-->
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-dark float-end btn-submit">Login</button>

                            <button class="btn btn-dark d-none btn-loading-submit float-end" type="button" disabled>
                                <span class="spinner-border spinner-border-sm me-1" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="card-footer text-center">
                    <div class="small"><a href="{{ url('registration') }}">Belum mendaftar? Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection