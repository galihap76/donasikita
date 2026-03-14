<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="DonasiKita memudahkan Anda berbagi kebaikan melalui donasi online yang cepat, aman, dan transparan." />
    <meta name="keywords"
        content="donasi online, platform donasi, donasi indonesia, penggalangan dana, donasi digital, website donasi, donasi kemanusiaan, donasi terpercaya, crowdfunding indonesia, donasi sosial" />
    <meta name="author" content="Galih Anggoro Prasetya" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <title>DonasiKita - Berbagi Kebaikan Tanpa Batas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/donasikita.png') }}">

    {{-- Acme regular --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Playwrite+IN:wght@100..400&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/landing-page.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .bi-chevron-left,
        .bi-chevron-right {
            cursor: pointer;
            font-size: 2rem;
            /* agar lebih besar */
        }

        .blink {
            animation: blink-animation 1s steps(2, start) infinite;
            -webkit-animation: blink-animation 1s steps(2, start) infinite;
            color: red;
            /* opsional, agar lebih menonjol */
            font-weight: bold;
            /* opsional */
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        .timeline {
            border-left: 2px solid black;
            position: relative;
            list-style: none;
            margin-left: 1rem;
            padding-left: 2rem;
        }

        .timeline-item {
            position: relative;
            padding-left: 2.5rem;
        }

        .timeline-item:after {
            content: "";
            position: absolute;
            left: -1.1rem;
            top: 0.3rem;
            width: 12px;
            height: 12px;
            /* background-color: #0d6efd;
            border-radius: 50%; */
            z-index: 1;
        }

        .timeline-icon {
            position: absolute;
            left: -51px;
            top: 0;
            width: 36px;
            height: 36px;
            background: black;
            border: 2px solid black;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
            font-size: 16px;
            z-index: 2;
        }
    </style>

</head>

<body id="home">

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow nav-donation">
            <div class="container-fluid">

                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/img/donasikita-nobackground.png') }}" class="ms-2 me-2"
                        style="width: 35px; height: 35px;">
                    <a class="navbar-brand acme-regular mb-0 h1" href="#home">
                        {{ env('APP_NAME') }}
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#campaign">Kampanye</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#faqs">Faqs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Kontak</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>


    <main>

        {{-- Hero --}}
        <section id="hero" class="hero-section">
            <div class="container mt-5">
                <div class="row align-items-center">
                    <div class="col text-center text-md-start mb-5">
                        <h1 class="acme-regular">{{ env('APP_NAME') }}</h1>

                        <div class="mb-3">
                            <span id="running" class="acme-regular" style="color: black; font-size: 25px;"></span>
                            <span id="cursor" class="blinking-cursor" style="font-size: 25px;">|</span>
                        </div>

                        <p>Setiap kebaikan, sekecil apa pun, dapat membawa perubahan.
                        </p>

                        @if(!Auth::check())
                        <a href="{{ url('/registration') }}" class="btn btn-dark" target="_blank"><i
                                class="bi bi-arrow-right-circle"></i>
                            Daftar</a>

                        @elseif(Auth::check())
                        <a href="{{ url('/dashboard') }}" class="btn btn-dark" target="_blank"><i
                                class="bi bi-arrow-right-circle"></i>
                            Masuk</a>

                        @endif

                    </div>

                    <div class="col-md">
                        <img src="{{ asset('assets/img/banner-logo.png') }}"
                            class="banner-logo img-fluid mx-auto d-block w-75 floating" style="border-style: none;"
                            alt="banner logo">
                    </div>

                </div>
            </div>

        </section>
        {{-- End hero --}}

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dcdcdc" fill-opacity="1"
                d="M0,160L30,160C60,160,120,160,180,144C240,128,300,96,360,80C420,64,480,64,540,85.3C600,107,660,149,720,165.3C780,181,840,171,900,144C960,117,1020,75,1080,64C1140,53,1200,75,1260,69.3C1320,64,1380,32,1410,16L1440,0L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dcdcdc" fill-opacity="1"
                d="M0,256L34.3,240C68.6,224,137,192,206,154.7C274.3,117,343,75,411,69.3C480,64,549,96,617,128C685.7,160,754,192,823,202.7C891.4,213,960,203,1029,218.7C1097.1,235,1166,277,1234,250.7C1302.9,224,1371,128,1406,80L1440,32L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg>

        {{-- About --}}
        <section id="about" class="text-center">

            <div class="container">
                <div class="row">
                    <h3 class="acme-regular" data-aos="fade-down" data-aos-duration="1000">Tentang
                        {{ env('APP_NAME') }}</h3>

                    <div class="col-lg-8 mx-auto">
                        <p data-aos="fade-down" data-aos-duration="1000">
                            DonasiKita adalah platform donasi digital yang memudahkan siapa saja untuk berbagi kebaikan.
                            Melalui sistem yang transparan dan aman, DonasiKita menghubungkan para donatur dengan
                            berbagai kampanye sosial, kemanusiaan, dan kebutuhan masyarakat yang membutuhkan bantuan.
                        </p>

                        <p data-aos="fade-down" data-aos-duration="1000">
                            Setiap kebaikan, sekecil apa pun, dapat membawa perubahan. Sebagai platform
                            donasi digital yang menghubungkan kebaikan para donatur dengan mereka yang membutuhkan
                            bantuan.
                        </p>
                    </div>
                </div>
            </div>

        </section>
        {{-- End about --}}

        {{-- Campaign --}}
        <section id="campaign">
            <div class="container">
                <div class="row mb-5">
                    <div class="col text-center">
                        <h3 data-aos="fade-down" data-aos-duration="1000" class="acme-regular">Kampanye</h3>

                        <p data-aos="fade-down" data-aos-duration="1000">
                            Pilih kampanye yang ingin Anda dukung dan jadilah bagian dari perubahan.
                        </p>
                    </div>
                </div>

                <div class="owl-carousel" data-aos="fade-down" data-aos-duration="1000">

                    @foreach($campaigns as $item)
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-thumbnail h-50"
                        alt="image-{{ $item->iteration }}">
                    @endforeach
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-center mb-3 mt-3" data-aos="zoom-in"
                        data-aos-duration="1000">
                        <a href="{{ url('list-campaigns') }}" class="btn btn-dark" target="_blank">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </section>
        {{-- End campaign --}}

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dcdcdc" fill-opacity="1"
                d="M0,32L34.3,26.7C68.6,21,137,11,206,21.3C274.3,32,343,64,411,85.3C480,107,549,117,617,106.7C685.7,96,754,64,823,85.3C891.4,107,960,181,1029,197.3C1097.1,213,1166,171,1234,149.3C1302.9,128,1371,128,1406,128L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dcdcdc" fill-opacity="1"
                d="M0,128L34.3,149.3C68.6,171,137,213,206,202.7C274.3,192,343,128,411,106.7C480,85,549,107,617,117.3C685.7,128,754,128,823,112C891.4,96,960,64,1029,80C1097.1,96,1166,160,1234,192C1302.9,224,1371,224,1406,224L1440,224L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg>

        {{-- Step by step --}}
        <section id="step-by-step" class="py-5 bg-white">
            <div class="container text-center mb-5">
                <h3 class="acme-regular acme-regular" data-aos="fade-down" data-aos-duration="1000">Buat Donasi</h3>
                <p data-aos="fade-down" data-aos-duration="1000">Proses buat donasi yang mudah diikuti untuk
                    semua orang. </p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <ul class="timeline">
                            <li class="timeline-item mb-5" data-aos="fade-down" data-aos-duration="1000">
                                <span class="timeline-icon text-white" style="background-color: black;"><i
                                        class="bi bi-person-fill-add"></i></span>
                                <h5 class="fw-bold">Pendaftaran</h5>
                                <p class="mb-2">
                                    Langkah pertama yang harus dilakukan adalah mendaftar dan masuk ke dalam sistem
                                    aplikasi web.
                                </p>
                            </li>

                            <li class="timeline-item mb-5" data-aos="fade-down" data-aos-duration="1000">
                                <span class="timeline-icon text-white" style="background-color: black;"><i
                                        class="bi bi-megaphone"></i></span>
                                <h5 class="fw-bold">Pilih Kampanye</h5>
                                <p class="mb-2">
                                    Pilih kampanye yang sesuai agar Anda bisa mulai mendonasikan kampanye yang Anda
                                    pilih.
                                </p>
                            </li>

                            <li class="timeline-item mb-5" data-aos="fade-down" data-aos-duration="1000">
                                <span class="timeline-icon text-white" style="background-color: black;"><i
                                        class="bi bi-pencil-fill"></i></span>
                                <h5 class="fw-bold">Isi Data Donasi</h5>
                                <p class="mb-2">
                                    Setelah memilih kampanye, Anda akan diarahkan untuk mengisi data donasi dan
                                    memilih metode pembayaran.
                                </p>
                            </li>

                            <li class="timeline-item mb-5" data-aos="fade-down" data-aos-duration="1000">
                                <span class="timeline-icon text-white" style="background-color: black;"><i
                                        class="bi bi-cash-coin"></i></span>
                                <h5 class="fw-bold">Donasi Terkirim</h5>
                                <p class="mb-2">
                                    Donasi berhasil diproses secara online dan tercatat pada kampanye yang Anda dukung.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        {{-- End step by step --}}

        {{-- FAQ --}}
        <section id="faqs">
            <div class="container mb-5">
                <div class="row">
                    <div class="col text-center">
                        <h3 data-aos="fade-down" data-aos-duration="1000" class="acme-regular">FAQs</h3>
                        <p data-aos="fade-down" data-aos-duration="1000">Pertanyaan umum yang sering ditanyakan.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="accordion accordion-flush" id="accordionExample">

                            {{-- 1 --}}
                            <div class="accordion-item" data-aos="fade-down" data-aos-duration="1000">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <h5 class="acme-regular">Bagaimana sistem pembayaran di DonasiKita?</h5>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Pembayaran donasi dilakukan secara otomatis melalui payment gateway
                                            <a href="https://mayar.id/" target="_blank">Mayar</a> yang
                                            mendukung
                                            metode pembayaran bank seperti BNI, BRI, Mandiri, BCA, dan lain lain.
                                            Setelah
                                            pembayaran berhasil, donasi berhasil dikirim dan tercatat di sistem.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="accordion-item" data-aos="fade-down" data-aos-duration="1000">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="acme-regular">Bagaimana cara berdonasi di DonasiKita?</h5>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Pilih kampanye yang ingin Anda bantu, masukkan nominal donasi, lalu lakukan
                                            pembayaran melalui metode yang tersedia.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 3 --}}
                            <div class="accordion-item" data-aos="fade-down" data-aos-duration="1000">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <h5 class="acme-regular"> Apakah donasi di DonasiKita aman?
                                        </h5>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Ya. DonasiKita menggunakan sistem pembayaran yang aman dan proses verifikasi
                                            pada setiap transaksi untuk memastikan donasi Anda tersalurkan dengan baik.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 4 --}}
                            <div class="accordion-item" data-aos="fade-down" data-aos-duration="1000">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <h5 class="acme-regular"> Apakah saya bisa berdonasi secara anonim?
                                        </h5>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Ya. DonasiKita menyediakan opsi bagi donatur untuk menyembunyikan identitas
                                            sehingga donasi dapat dilakukan secara anonim.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 6 --}}
                            <div class="accordion-item" data-aos="fade-down" data-aos-duration="1000">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <h5 class="acme-regular"> Bagaimana jika saya mengalami masalah teknis?
                                        </h5>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Silakan hubungi Admin selaku pengembang dan pendiri DonasiKita dengan klik
                                            ini
                                            👉
                                            <a href="https://wa.me/+6285848672686?text=Halo Admin WebNikahanku, saya mengalami kendala teknis pada undangan saya. Mohon bantuannya ya."
                                                target="_blank">Via WhatsApp</a>
                                            👈 untuk informasi lebih lanjut.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        {{-- End FAQ --}}

        {{-- Contact --}}
        <section class="mt-5 mb-5" id="contact">
            <div class="container">

                <div class="row mb-3">
                    <div class="col text-center">
                        <h3 data-aos="fade-down" data-aos-duration="1000" class="acme-regular">Kontak Kami</h3>
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-down" data-aos-duration="1000">

                    <div class="col-lg-12">

                        <div class="card shadow border-0">

                            <div class="row g-0">

                                <!-- INFO KONTAK -->
                                <div class="col-md-5 bg-dark text-white p-4">

                                    <h4 class="mb-3">
                                        <i class="bi bi-chat-dots"></i> Kontak Kami
                                    </h4>

                                    <p class="small">
                                        Jika Anda memiliki pertanyaan mengenai donasi,
                                        kendala pembayaran, atau kerja sama kampanye,
                                        silakan hubungi kami.
                                    </p>

                                    <hr>

                                    <p class="mb-2">
                                        <i class="bi bi-envelope"></i>
                                        support@donasikita.web.id
                                    </p>

                                    <p class="mb-2">
                                        <i class="bi bi-whatsapp"></i>
                                        +62 858 4867 2686
                                    </p>

                                    <p class="mb-2">
                                        <i class="bi bi-clock"></i>
                                        Senin - Jumat (09:00 - 17:00)
                                    </p>

                                </div>

                                <!-- FORM -->
                                <div class="col-md-7 p-4">

                                    <h5 class="mb-4 text-center">Kirim Pesan</h5>

                                    <form method="POST" class="form-add-message">

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Masukkan nama Anda" maxlength="50" autocomplete="off"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Masukkan email Anda" autocomplete="off" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="category">Kategori</label>
                                            <select class="form-select" name="category" autocomplete="off"
                                                id="category">
                                                <option value="pertanyaan umum">Pertanyaan Umum</option>
                                                <option value="kendala donasi">Kendala Donasi</option>
                                                <option value="kerja sama kampanye">Kerja Sama Kampanye</option>
                                                <option value="laporan kampanye">Laporan Kampanye</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="message">Pesan</label>
                                            <textarea class="form-control" rows="4" name="message" id="message"
                                                placeholder="Tulis pesan Anda di sini..." autocomplete="off"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-dark w-100 btn-submit">
                                            <i class="bi bi-send"></i>
                                            Kirim Pesan
                                        </button>

                                        <button class="btn btn-dark w-100 d-none btn-submit-loading" type="button"
                                            disabled>
                                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                            <span role="status">Loading...</span>
                                        </button>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        {{-- End Contact --}}

    </main>

    <footer class="text-white text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>© {{ date('Y') }} Copyright {{ env('APP_NAME') }}. All Rights Reserved.</p>

                    <p class="mb-0 mt-3">
                        Developed by
                        <a href="https://galihdev.my.id/" class="text-white fw-bold text-decoration-underline"
                            target="_blank">
                            Galih Anggoro Prasetya
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/landing-page.js') }}"></script>

</body>

</html>