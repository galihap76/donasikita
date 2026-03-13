@extends('layout')

@section('title', 'Pengaturan Akun - ' . env('APP_NAME'))

@section('content')

@if($success = Session::get('success'))
<script>
    Swal.fire({
        title: "Berhasil",
        text: "{{ $success }}",
        icon: "success"
    });
</script>
@endif

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-person-fill-gear"></i></div>
                        Pengaturan Akun - Profil
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="{{ url('/account') }}">Profil</a>
    </nav>
    <hr class="mt-0 mb-4" />
    <div class="row">
        <div class="col">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Informasi Akun</div>
                <div class="card-body">
                    <form action="{{ url('/account-process') }}" method="post">
                        @csrf

                        <!-- Form Group (name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nama Lengkap</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                type="text" value="{{ Auth::user()->name }}" maxlength="50" required />

                            @if ($errors->has('name'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('name'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (email)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                type="email" value="{{ Auth::user()->email }}" disabled />
                        </div>

                        <!-- Form Group (phone number)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="phone_number">No Telepon</label>
                            <input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                name="phone_number" type="number" value="{{ Auth::user()->phone_number }}" disabled />
                        </div>

                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="password">Password (Opsional)</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" type="password" value="{{ old('password') }}" />

                            @if ($errors->has('password'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password'))}}
                            </p>
                            @endif
                        </div>

                        <!-- Form Group (password confirmation)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="password_confirmation">Konfirmasi Password</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" value="{{ old('password_confirmation') }}"
                                name="password_confirmation" type="password" />

                            @if ($errors->has('password_confirmation'))
                            <p class="mt-3" style="font-size: 15px; color:red;"><i
                                    class="bi bi-exclamation-octagon-fill"></i>
                                {{ucfirst($errors->first('password_confirmation'))}}
                            </p>
                            @endif
                        </div>

                        <i>* Password minimal 10 karakter. Gunakan kombinasi huruf, angka, dan simbol agar lebih
                            aman.</i>

                        <!-- Form Group (lihat password)-->
                        <div class="mb-3 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" id="toggle-password" type="checkbox"
                                    name="toggle-password" />
                                <label class="form-check-label" for="toggle-password">Lihat Password</label>
                            </div>
                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-success mt-3 float-end" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection