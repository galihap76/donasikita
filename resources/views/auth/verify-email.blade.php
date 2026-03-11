@extends('auth.layout')

@section('title', 'Verifikasi Email - ' . env('APP_NAME'))

@section('content')

<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <!-- Basic Lupa Password form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-body">

                    @if($message = Session::get('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <i class="bi bi-envelope-fill"></i>

                        {{ $message }}
                    </div>

                    @else
                    <div class="alert alert-success text-center" role="alert">
                        <i class="bi bi-envelope-fill"></i>
                        Pendaftaran berhasil. Silakan periksa inbox atau folder spam pada email Anda untuk
                        memverifikasi
                        akun.
                    </div>

                    @endif

                    <!--  kirim ulang form-->
                    <form action="{{url('/email/verification-notification')}}" method="post">
                        @csrf

                        <!-- Form Group (kirim box)-->
                        <div class="mt-4 mb-0">
                            <button type="submit" class="btn btn-dark float-end btn-submit">Kirim Ulang</button>

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