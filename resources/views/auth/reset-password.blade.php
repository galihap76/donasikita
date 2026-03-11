@extends('auth.layout')

@section('title', 'Reset Password - ' . env('APP_NAME'))

@section('content')

<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <!-- Basic Reset Password form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">
                    <h3 class="fw-light my-4 text-center">Reset Password</h3>
                </div>

                <div class="card-body">

                    <!--  Reset password form-->
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf

                        <input type="hidden" name="token" value="{{ request()->token }}">
                        <input type="hidden" name="email" value="{{ request()->email }}">

                        <!-- Form Group (password)-->
                        <div class="mb-4 position-relative">
                            <label class="small mb-1" for="password">Password Baru</label>
                            <input class="form-control  @error('password') is-invalid @enderror" id="password"
                                name="password" type="password" placeholder="Masukkan password baru" required />

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
                                placeholder="Masukkan konfirmasi password" required />

                            <i class="bi bi-eye-slash-fill password-icon" style="display: block;"></i>
                            <i class="bi bi-eye-fill password-icon" style="display: none;"></i>

                            @if ($errors->has('password_confirmation'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password_confirmation'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (reset password box)-->
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-dark float-end btn-submit">Reset Password</button>

                            <button class="btn btn-dark d-none btn-loading-submit float-end" type="button" disabled>
                                <span class="spinner-border spinner-border-sm me-1" aria-hidden="true"></span>
                                <span role="status">Loading...</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection