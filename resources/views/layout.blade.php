<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Platfrom web donasi" />
    <meta name="author" content="Galih Anggoro Prasetya" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="mobile-web-app-capable" content="yes">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous">
    </script>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/donasikita.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
        id="sidenavAccordion">
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
                data-feather="menu"></i></button>
        <!-- Navbar Brand-->
        <!-- * * Tip * * You can use text or an image for your navbar brand.-->
        <!-- * * * * * * When using an image, we recommend the SVG format.-->
        <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ asset('/dashboard') }}">{{ env('APP_NAME') }}</a>

        <!-- Navbar Items-->
        <ul class="navbar-nav align-items-center ms-auto">

            <!-- User Dropdown-->
            <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid" src="#" /></a>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="#" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
                            <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item mb-3" href="{{ url('/account') }}">
                        <div class="dropdown-item-icon"><i class="bi bi-person-fill-gear"></i></div>
                        Account
                    </a>

                    <form method="post" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="dropdown-item">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </button>
                    </form>

                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">

            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">

                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Dashboard</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed {{ Request::path() == 'dashboard' ? 'active' : '' }}"
                            href="{{ url('/dashboard') }}">
                            <div class="nav-link-icon"><i class="bi bi-speedometer"></i></div>
                            Dashboard
                        </a>

                        @if(Auth::user()->role == "admin")
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Kampanye</div>

                        <!-- Sidenav Accordion (Campaigns)-->
                        <a class="nav-link collapsed {{ Request::segment(1) == 'campaigns' ? 'active' : '' }}"
                            href="{{ url('/campaigns') }}">
                            <div class="nav-link-icon"><i class="bi bi-megaphone"></i></div>
                            Daftar Kampanye
                        </a>
                        @endif

                    </div>
                </div>

                <!-- Sidenav Footer-->
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Telah Login : </div>
                        <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    @if(Request::path() == 'dashboard')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script>
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [
                    "Jan","Feb","Mar","Apr","May","Jun",
                    "Jul","Aug","Sep","Oct","Nov","Dec"
                ],
                datasets: [{
                    label: "Penjualan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(0, 97, 242, 0.05)",
                    borderColor: "rgba(0, 97, 242, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(0, 97, 242, 1)",
                    pointBorderColor: "rgba(0, 97, 242, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
                    pointHoverBorderColor: "rgba(0, 97, 242, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: @json($monthlySales)
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return 'Rp ' + tooltipItem.yLabel.toLocaleString('id-ID');
                        }
                    }
                }
            }
        });
    </script> --}}

    @endif

    @if(Request::segment(1) == 'campaigns')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/datatables/datatables-simple-demo.js') }}"></script>

    <script>
        function btnDelete(id){
            let form_id = `.form-id-${id}`;
            let selector_class_form_id = document.querySelector(form_id);

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: `Data tidak bisa dikembalikan.`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    selector_class_form_id.submit();
                }
            });
        }
    </script>
    @endif

</body>

</html>