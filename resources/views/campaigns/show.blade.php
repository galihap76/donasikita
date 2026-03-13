<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
        content="DonasiKita memudahkan Anda berbagi kebaikan melalui donasi online yang cepat, aman, dan transparan." />
    <meta name="author" content="Galih Anggoro Prasetya" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Open Graph untuk preview link -->
    <meta property="og:title" content="DonasiKita - Donasi online yang cepat, aman, dan transparan" />
    <meta property="og:description"
        content="DonasiKita memudahkan Anda berbagi kebaikan melalui donasi online yang cepat, aman, dan transparan." />
    <meta property="og:image" content="{{ asset('assets/img/preview-logo.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Untuk Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="DonasiKita - Donasi online yang cepat, aman, dan transparan" />
    <meta name="twitter:description"
        content="DonasiKita memudahkan Anda berbagi kebaikan melalui donasi online yang cepat, aman, dan transparan." />
    <meta name="twitter:image" content="{{ asset('assets/img/preview-logo.png') }}" />

    <title>Kampanye - {{ env('APP_NAME') }}</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/donasikita.png') }}">
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .campaign-card {
            transition: all 0.25s ease;
        }

        .campaign-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .donation-scroll-box {
            max-height: 400px;
            overflow-y: auto;
            background: #ffffff;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .donation-item {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .donation-item:last-child {
            border-bottom: none;
        }

        .donation-scroll-box::-webkit-scrollbar {
            width: 6px;
        }

        .donation-scroll-box::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
    </style>

</head>

<body class="nav-fixed">

    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h3 class="page-header-title">
                            <div class="page-header-icon"></div>
                            <i class="bi bi-megaphone me-3"></i> Kampanye - {{ env('APP_NAME') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>

        @php
        $progress = $campaign->target_amount > 0
        ? ($campaign->collected_amount / $campaign->target_amount) * 100
        : 0;
        @endphp

        <section class="mt-5 mb-4">
            <div class="container">

                <div class="card border-0 shadow-sm campaign-card">

                    <div class="row g-0">

                        <div class="col-md-5">

                            <img src="{{ asset('storage/'.$campaign->image) }}" class="img-fluid rounded-start"
                                style="height:100%;object-fit:cover;">

                        </div>

                        <div class="col-md-7">

                            <div class="card-body d-flex flex-column h-100">

                                <div class="mb-2 text-muted small">

                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $campaign->created_at->locale('id')->translatedFormat('d F Y') }}

                                </div>

                                <h3 class="fw-bold mb-3">
                                    {{ $campaign->title }}
                                </h3>

                                <p class="text-muted">

                                    {{ $campaign->description }}

                                </p>

                                <div class="mt-auto">

                                    <div class="progress mb-2" style="height:10px;">

                                        <div class="progress-bar bg-success" style="width: {{ $progress }}%">
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-between mb-3">

                                        <div>

                                            <div class="text-success fw-bold">
                                                Rp {{ number_format($campaign->collected_amount,0,',','.') }}
                                            </div>

                                            <small class="text-muted">
                                                Dana Terkumpul
                                            </small>

                                        </div>

                                        <div class="text-end">

                                            <div class="fw-bold">
                                                Rp {{ number_format($campaign->target_amount,0,',','.') }}
                                            </div>

                                            <small class="text-muted">
                                                Target Dana
                                            </small>

                                        </div>

                                    </div>

                                    <div class="d-grid">

                                        <a href="{{ route('donations.create', $campaign->slug) }}"
                                            class="btn btn-success btn-lg" target="_blank">

                                            <i class="bi bi-heart-fill me-1"></i>
                                            Donasi Sekarang

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

        <section class="mt-5 mb-5">
            <div class="container">

                <div class="row mb-4">
                    <div class="col">
                        <h4 class="fw-bold">
                            <i class="bi bi-chat-dots me-2"></i>
                            Pesan Para Donatur
                        </h4>
                    </div>
                </div>

                @if($donations->isNotEmpty())

                <div class="donation-scroll-box">

                    @foreach($donations as $donation)

                    <div class="donation-item">

                        <div class="d-flex justify-content-between mb-1">

                            <span class="fw-semibold">

                                @if($donation->is_anonymous)
                                <i class="bi bi-person-circle me-1"></i>
                                Donatur Baik
                                @else
                                <i class="bi bi-person-circle me-1"></i>
                                {{ $donation->user->name }}
                                @endif

                            </span>

                            <span class="text-success fw-semibold small">
                                Rp {{ number_format($donation->amount,0,',','.') }}
                            </span>

                        </div>

                        <div class="text-muted small mb-1">

                            @if($donation->message)
                            {{ $donation->message }}
                            @else
                            Donatur tidak meninggalkan pesan.
                            @endif

                        </div>

                        <div class="text-muted small">

                            <i class="bi bi-clock me-1"></i>
                            {{ \Carbon\Carbon::parse($donation->created_at)->locale('id')->diffForHumans() }}

                        </div>

                    </div>

                    @endforeach

                </div>

                <p class="mt-5">
                    {{ $donations->count() }} Donatur telah berdonasi.

                    <a href="{{ url()->previous() }}" class="btn btn-dark float-end"><i
                            class="bi bi-arrow-left me-1"></i> Kembali</a>
                </p>

                @else

                <div class="text-center mt-4">

                    <i class="bi bi-emoji-frown-fill me-1"></i>

                    <h5 class="mt-3 text-muted">
                        Belum ada donasi untuk kampanye ini.
                    </h5>

                    <div class="clearfix">
                        <a href="{{ url()->previous() }}" class="btn btn-dark float-end mt-3"><i
                                class="bi bi-arrow-left me-1"></i> Kembali</a>
                    </div>

                </div>

                @endif

            </div>
        </section>
    </main>


    <footer class="text-center bg-dark">
        <div class="container">
            <div class="row">
                <div class="col mt-3">
                    <p style="color: white;">© Copyright {{ env('APP_NAME') }}. All Rights
                        Reserved</p>

                    <p style="color: white;">
                        Developed By
                        <a href="https://galihdev.my.id/" class="text-white fw-bold" style="text-decoration: underline;"
                            target="_blank">Galih Anggoro
                            Prasetya</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>