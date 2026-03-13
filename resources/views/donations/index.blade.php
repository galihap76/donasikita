@extends('layout')

@section('title', 'Daftar Donasi - ' . env('APP_NAME'))

@section('content')

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-heart-fill" style="font-size: 25px;"></i></div>
                        Daftar Donasi
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
                <div class="card-header text-dark">Daftar Donasi</div>

                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Donatur</th>
                                <th>Kampanye</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Donatur</th>
                                <th>Kampanye</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </tfoot>

                        <tbody>

                            @foreach($donations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->is_anonymous == 0 ? ucwords($item->name) : 'Anonim' }}</td>
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
                                <td>

                                    {{ $item->created_at->translatedFormat('d M Y') }}

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <hr />
                    <strong>Total Donasi : Rp {{ number_format($sumDonations, 0, ',', '.') }} </strong>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection