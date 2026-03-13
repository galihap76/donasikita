@extends('layout')

@section('title', 'Donasi Kampanye - ' . env('APP_NAME') )

@section('content')

@if($success = Session::get('success'))
<script>
    Swal.fire({
        title: "Berhasil",
        text: "{{ $success }}",
        icon: "success"
    });
</script>

@elseif($error = Session::get('error'))
<script>
    Swal.fire({
        title: "Gagal",
        text: "{{ $error }}",
        icon: "error"
    });
</script>
@endif

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-cash-coin" style="font-size: 25px;"></i></div>
                        Donasi Kampanye
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    <div class="row">
        <div class="col-lg-8">

            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Form Donasi Kampanye</div>

                    <div class="card-body">

                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">

                                <form method="POST" action="{{ route('donations.store', $campaign->slug) }}">
                                    @csrf

                                    <div class="mb-4">
                                        <h5 class="mb-3">{{ $campaign->title }}</h5>
                                        <p class="text-muted">{{ Str::limit($campaign->description,120) }}</p>
                                    </div>


                                    <label class="mb-2 fw-bold">Pilih Nominal Donasi</label>

                                    <div class="row mb-3">

                                        <div class="col-md-3 mb-2">
                                            <label class="btn btn-outline-dark w-100">
                                                <input type="radio" name="amount" value="10000" class="me-1">
                                                Rp10.000
                                            </label>
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label class="btn btn-outline-dark w-100">
                                                <input type="radio" name="amount" value="25000" class="me-1">
                                                Rp25.000
                                            </label>
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label class="btn btn-outline-dark w-100">
                                                <input type="radio" name="amount" value="50000" class="me-1">
                                                Rp50.000
                                            </label>
                                        </div>

                                        <div class="col-md-3 mb-2">
                                            <label class="btn btn-outline-dark w-100">
                                                <input type="radio" name="amount" value="100000" class="me-1">
                                                Rp100.000
                                            </label>
                                        </div>

                                    </div>


                                    <label for="custom_amount" class="mb-2">Nominal Lain</label>

                                    <div class="input-group mb-2">
                                        <span class="input-group-text">Rp</span>

                                        <input type="number" name="custom_amount" id="custom_amount"
                                            class="form-control @error('custom_amount') is-invalid @enderror"
                                            placeholder="Masukkan nominal donasi" value="{{ old('custom_amount') }}">
                                    </div>

                                    @error('custom_amount')
                                    <p class="mt-2" style="font-size:15px;color:red;">
                                        <i class="bi bi-exclamation-octagon-fill"></i>
                                        {{ ucfirst($message) }}
                                    </p>
                                    @enderror


                                    <div class="mb-3">
                                        <label for="donor_name" class="mb-2">Nama Donatur</label>
                                        <input type="text" name="donor_name" id="donor_name" class="form-control"
                                            placeholder="Nama Anda" value="{{ ucwords(Auth::user()->name) }}" disabled>
                                    </div>


                                    <div class="mb-3">
                                        <label for="message" class="mb-2">Pesan Dukungan (Opsional)</label>
                                        <textarea name="message" id="message"
                                            class="form-control @error('message') is-invalid @enderror" rows="3"
                                            placeholder="Tulis pesan dukungan..."
                                            maxlength="500">{{ old('message') }}</textarea>

                                        @error('message')
                                        <p class="mt-2" style="font-size:15px;color:red;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            {{ ucfirst($message) }}
                                        </p>
                                        @enderror
                                    </div>


                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="1" name="is_anonymous"
                                            id="is_anonymous">

                                        <label class="form-check-label" for="is_anonymous">
                                            Donasi sebagai anonim
                                        </label>
                                    </div>


                                    <div class="mt-4 clearfix">

                                        <button type="submit" class="btn btn-success float-end ms-3">
                                            Bayar
                                        </button>

                                        <a href="{{ url('/campaigns') }}" class="btn btn-danger float-end">
                                            Kembali
                                        </a>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card mb-4 sticky-top">
                <div class="card-header">Informasi Kampanye</div>

                <div class="card-body">

                    <img src="{{ asset('storage/'.$campaign->image) }}"
                        class="img-fluid rounded mb-3 w-75 mx-auto d-block">

                    <p class="mb-1"><strong>Target Donasi</strong></p>
                    <p>Rp {{ number_format($campaign->target_amount,0,',','.') }}</p>

                    <p class="mb-1"><strong>Terkumpul</strong></p>
                    <p>Rp {{ number_format($campaign->collected_amount,0,',','.') }}</p>

                    <div class="progress">
                        <div class="progress-bar bg-success"
                            style="width: {{ ($campaign->collected_amount / $campaign->target_amount) * 100 }}%">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection