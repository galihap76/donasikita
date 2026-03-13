@extends('layout')

@section('title', 'Riwayat Donasi - ' . env('APP_NAME'))

@section('content')

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-clock-history" style="font-size: 25px;"></i></div>
                        Riwayat Donasi
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main page content-->
<div class="container-xl px-4 mt-n10">

    <div class="row">
        <div class="col mb-4">
            <div class="card mb-4">
                <div class="card-header">Riwayat Donasi</div>

                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kampanye</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kampanye</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>

                            @foreach($donationHistories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($item->title) }}</td>
                                <td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                                <td>

                                    @if($item->status == 'success')
                                    <span class="badge text-bg-success">Sukses</span>

                                    @elseif($item->status == 'pending')
                                    <span class="badge text-bg-warning">Pending</span>

                                    @elseif($item->status == 'failed')
                                    <span class="badge text-bg-danger">Pembayaran Gagal</span>
                                    @endif

                                </td>

                                <td> {{ $item->created_at->translatedFormat('d M Y H:i') }} </td>

                                <td>

                                    <div class="d-flex justify-content-center">

                                        @if($item->status == 'pending')
                                        <a href="#" class="btn btn-danger">
                                            Selesaikan Pembayaran
                                        </a>

                                        @else
                                        -
                                        @endif

                                    </div>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <hr />
                    <strong>Total Donasi Anda : Rp {{ number_format($sumDonations, 0, ',', '.') }} </strong>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection