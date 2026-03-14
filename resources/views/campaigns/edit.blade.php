@extends('layout')

@section('title', 'Edit Kampanye - ' . env('APP_NAME') )

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
                        Edit Kampanye
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
                    <div class="card-header text-dark">Form Edit Kampanye</div>

                    <div class="card-body">

                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">

                                <form method="post" action="{{ route('campaigns.update', $campaign->campaign_id) }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="title" class="mb-2">Judul Kampanye</label>

                                        <input class="form-control @error('title') is-invalid @enderror" id="title"
                                            type="text" maxlength="100" name="title" autocomplete="off"
                                            value="{{ old('title', $campaign->title) }}" required />

                                        @if ($errors->has('title'))
                                        <p class="mt-3" style="font-size: 15px; color:red;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            {{ ucfirst($errors->first('title')) }}
                                        </p>
                                        @endif
                                    </div>

                                    <!-- Target Donasi -->
                                    <label for="target_amount" class="mb-2">Target Donasi</label>
                                    <div class="input-group mb-3">

                                        <span class="input-group-text">Rp</span>

                                        <input type="number"
                                            class="form-control @error('target_amount') is-invalid @enderror"
                                            id="target_amount" name="target_amount" autocomplete="off"
                                            value="{{ old('target_amount', $campaign->target_amount) }}" required />
                                    </div>

                                    @if ($errors->has('target_amount'))
                                    <p class="mt-3" style="font-size: 15px; color:red;">
                                        <i class="bi bi-exclamation-octagon-fill"></i>
                                        {{ ucfirst($errors->first('target_amount')) }}
                                    </p>
                                    @endif

                                    <!-- Gambar Lama -->
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Saat Ini</label>
                                        <br>

                                        <img src="{{ asset('storage/'.$campaign->image) }}" width="200"
                                            class="img-thumbnail">
                                    </div>


                                    <!-- Upload Gambar Baru -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Ganti Gambar (Opsional)</label>

                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image">

                                        @if ($errors->has('image'))
                                        <p class="mt-3" style="font-size: 15px; color:red;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            {{ ucfirst($errors->first('image')) }}
                                        </p>
                                        @endif
                                    </div>


                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status"
                                            name="status" required>

                                            <option value="">- Pilih Status -</option>

                                            <option value="active" {{ old('status', $campaign->status) == 'active' ?
                                                'selected' : '' }}>
                                                Aktif
                                            </option>

                                            <option value="closed" {{ old('status', $campaign->status) == 'closed' ?
                                                'selected' : '' }}>
                                                Nonaktif
                                            </option>

                                        </select>

                                        @if ($errors->has('status'))
                                        <p class="mt-3" style="font-size: 15px; color:red;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            {{ ucfirst($errors->first('status')) }}
                                        </p>
                                        @endif
                                    </div>


                                    <!-- Deskripsi -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>

                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="3" style="height:150px;"
                                            required>{{ old('description', $campaign->description) }}</textarea>

                                        @if ($errors->has('description'))
                                        <p class="mt-3" style="font-size: 15px; color:red;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            {{ ucfirst($errors->first('description')) }}
                                        </p>
                                        @endif
                                    </div>


                                    <div class="mt-4 mb-2 clearfix">

                                        <button type="submit" class="btn btn-warning float-end ms-3">
                                            Update
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
    </div>
</div>

@endsection