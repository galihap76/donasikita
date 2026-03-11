@extends('layout')

@section('title', 'Dashboard - ' . env('APP_NAME'))

@section('content')

@if($success = Session::get('success'))
<script>
    Swal.fire({
        title: "Berhasil Login",
        text: "{{ $success }}",
        icon: "success"
    });
</script>

@elseif($verify_successfully = Session::get('verify-successfully'))
<script>
    Swal.fire({
        title: "Berhasil Verifikasi",
        text: "{{ $verify_successfully }}",
        icon: "success"
    });
</script>
@endif

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title mb-3">
                        <div class="page-header-icon"><i class="bi-speedometer2" style="font-size: 25px;"></i></div>
                        Dashboard
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">

    <!-- Example Colored Cards for Dashboard Demo-->
    <div class="row">
        <div class="col-lg-3 col-xl-3 mb-4">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Total Donasi Hari Ini </div>
                            <div class="text-lg fw-bold">Rp 0</div>
                        </div>
                        <i class="bi bi-cash-stack text-white-50" style="font-size: 30px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xl-3 mb-4">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">
                                Jumlah Donasi Hari Ini</div>
                            <div class="text-lg fw-bold">0
                            </div>
                        </div>
                        <i class="bi bi-receipt text-white-50" style="font-size: 30px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xl-3 mb-4">
            <div class="card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Jumlah Kampanye </div>
                            <div class="text-lg fw-bold">5
                            </div>
                        </div>
                        <i class="bi bi-megaphone text-white-50" style="font-size: 30px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xl-3 mb-4">
            <div class="card bg-warning text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Jumlah Pengguna
                            </div>
                            <div class="text-lg fw-bold">7
                            </div>
                        </div>
                        <i class="bi bi-people text-white-50" style="font-size: 30px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Area chart example-->
    <div class="card mb-4">
        <div class="card-header">Grafik Penjualan Bulanan</div>
        <div class="card-body">
            <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
        </div>
        <div class="card-footer small text-muted"> Data penjualan tahun {{ date('Y') }}.</div>
    </div>

</div>
@endsection