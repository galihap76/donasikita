@extends('layout')

@section('title', 'Tambah Kampanye - ' . env('APP_NAME') )

@section('content')

@if($error = Session::get('error'))
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
                        <div class="page-header-icon"><i class="bi bi-megaphone" style="font-size: 25px;"></i></div>
                        Tambah Kampanye
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    <div class="row">
        <div class="col">

            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Form Tambah Kampanye</div>

                    <div class="card-body">

                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form method="post" action="{{ route('campaigns.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="mb-2">Judul Kampanye</label>
                                        <input class="form-control @error('title') is-invalid @enderror" id="title"
                                            type="text" maxlength="100" name="title" autocomplete="off"
                                            value="{{ old('title') }}" required />

                                        @if ($errors->has('title'))
                                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                                class="bi bi-exclamation-octagon-fill"></i>
                                            {{ucfirst($errors->first('title'))}}
                                        </p>
                                        @endif
                                    </div>

                                    <label for="target_amount" class="mb-2">Target Donasi</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number"
                                            class="form-control @error('target_amount') is-invalid @enderror"
                                            id="target_amount" name="target_amount" autocomplete="off"
                                            value="{{ old('target_amount') }}" required />
                                    </div>

                                    @if ($errors->has('target_amount'))
                                    <p class="mt-3" style="font-size: 15px; color:red;"><i
                                            class="bi bi-exclamation-octagon-fill"></i>
                                        {{ucfirst($errors->first('target_amount'))}}
                                    </p>
                                    @endif

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" required>

                                        @if ($errors->has('image'))
                                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                                class="bi bi-exclamation-octagon-fill"></i>
                                            {{ucfirst($errors->first('image'))}}
                                        </p>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="3" style="height: 150px;"
                                            required>{{ old('description') }}</textarea>

                                        @if ($errors->has('description'))
                                        <p class="mt-3" style="font-size: 15px; color:red;"><i
                                                class="bi bi-exclamation-octagon-fill"></i>
                                            {{ucfirst($errors->first('description'))}}
                                        </p>
                                        @endif
                                    </div>

                                    <div class="mt-4 mb-2 clearfix">

                                        <button type="submit" name="report"
                                            class="btn btn-success float-end ms-3">Tambah</button>

                                        <a href="{{ url('/campaigns') }}" class="btn btn-danger float-end">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection