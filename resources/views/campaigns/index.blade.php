@extends('layout')

@section('title', 'Daftar Kampanye - ' . env('APP_NAME'))

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

<header class="page-header page-header-dark bg-dark pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="bi bi-megaphone" style="font-size: 25px;"></i></div>
                        Daftar Kampanye
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
                <div class="card-header">Daftar Kampanye</div>

                <div class="card-body">

                    <a href="{{ route('campaigns.create') }}" class="btn btn-success mb-4"><i
                            class="bi bi-plus-circle me-1"></i> Tambah Kampanye</a>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Target Donasi</th>
                                <th>Dana Terkumpul</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Target Donasi</th>
                                <th>Dana Terkumpul</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>

                        <tbody>

                            @foreach($campaigns as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($item->title) }}</td>
                                <td>Rp {{ number_format($item->target_amount, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->collected_amount, 0, ',', '.') }}</td>
                                <td>{!! $item->status == 'active' ? '<span class="badge text-bg-success">Aktif</span>'
                                    : '<span class="badge text-bg-danger">Nonaktif</span>' !!}</td>
                                <td>

                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('campaigns.destroy', $item->campaign_id) }}"
                                            method="post" class="d-flex gap-2 form-id-{{ $item->campaign_id }}">

                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('campaigns.show', $item->campaign_id) }}"
                                                class="btn btn-primary">
                                                <i class="bi bi-eye-fill me-1"></i> Lihat
                                            </a>

                                            <a href="{{ route('campaigns.edit', $item->campaign_id) }}"
                                                class="btn btn-warning">
                                                <i class="bi bi-pencil-fill me-1"></i> Edit
                                            </a>

                                            <button type="button" class="btn btn-danger btnDelete"
                                                onclick="btnDelete('{{ $item->campaign_id }}')">
                                                <i class="bi bi-trash-fill me-1"></i> Delete
                                            </button>

                                        </form>
                                    </div>

                                </td>
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