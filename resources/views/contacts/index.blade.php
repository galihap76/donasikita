@extends('layout')

@section('title', 'Daftar Pesan - ' . env('APP_NAME'))

@section('content')

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-chat-left-text-fill" style="font-size: 25px;"></i>
                        </div>
                        Daftar Pesan
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
                <div class="card-header text-dark">Daftar Pesan</div>

                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Pesan</th>
                                <th>Dikirim Pada</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Pesan</th>
                                <th>Dikirim Pada</th>
                            </tr>
                        </tfoot>

                        <tbody>

                            @foreach($contacts as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($item->name) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ ucwords($item->category) }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->created_at->translatedFormat('d M Y H:i') }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection