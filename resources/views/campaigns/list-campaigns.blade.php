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

    <title>Daftar Kampanye - {{ env('APP_NAME') }}</title>
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
                            <i class="bi bi-journal-text me-3"></i> Daftar Kampanye - {{ env('APP_NAME') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="list-campaigns">
            <div class="container-xl px-4 mt-n10 mb-5">

                @if($campaigns->isNotEmpty())

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach($campaigns as $campaign)

                    @php
                    $progress = $campaign->target_amount > 0
                    ? ($campaign->collected_amount / $campaign->target_amount) * 100
                    : 0;
                    @endphp

                    <div class="col">

                        <div class="card h-100 border-0 shadow-sm campaign-card">

                            <img src="{{ asset('storage/'.$campaign->image) }}" class="card-img-top"
                                style="height:200px;object-fit:cover;">

                            <div class="card-body d-flex flex-column">

                                <div class="mb-2 small text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($campaign->created_at)->translatedFormat('d M Y') }}
                                </div>

                                <h5 class="fw-bold">
                                    {{ $campaign->title }}
                                </h5>

                                <p class="text-muted small">
                                    {{ \Illuminate\Support\Str::limit($campaign->description,90) }}
                                </p>

                                <div class="mt-auto">

                                    <div class="progress mb-2" style="height:8px;">
                                        <div class="progress-bar bg-success" style="width: {{ $progress }}%">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between small mb-3">

                                        <span class="fw-semibold text-success">
                                            Rp {{ number_format($campaign->collected_amount,0,',','.') }}
                                        </span>

                                        <span class="text-muted">
                                            Target Rp {{ number_format($campaign->target_amount,0,',','.') }}
                                        </span>

                                    </div>

                                    <div class="d-grid gap-2">

                                        <a href="{{ route('donations.create', $campaign->slug) }}"
                                            class="btn btn-success btn-sm mb-2" target="_blank">
                                            <i class="bi bi-heart me-1"></i>
                                            Donasi Sekarang
                                        </a>

                                        <a href="{{ route('campaigns.show', $campaign->slug) }}"
                                            class="btn btn-outline-dark btn-sm">
                                            Lihat Kampanye
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $campaigns->links() }}
                </div>

                @else

                <div class="row">
                    <div class="col" data-aos="fade-down" data-aos-duration="1000">
                        <div class="bg-white rounded p-3" style="box-shadow: 0px 0 30px rgba(0, 0, 0, 0.1);">

                            <div class="row">
                                <div class="col">
                                    <h1 class="fw-semibold text-center" style="font-size: 40px;">Oops! Kampanye masih
                                        kosong nih</h1>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col text-center">
                                    <img src="{{ asset('assets/img/empty-campaigns.png') }}" class="img-fluid w-50"
                                        alt="empty-campaigns">
                                </div>
                            </div>

                        </div>
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