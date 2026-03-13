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

    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/donasikita.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous">
    </script>

    <style>
        .password-icon {
            position: absolute;
            top: 38px;
            right: 15px;
            cursor: pointer;
            color: #6c757d;
            font-size: 18px;
        }

        .password-icon:hover {
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>

</body>

</html>