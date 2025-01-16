<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" />
                <span class="d-none d-lg-block">MyTani</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile"
                                class="rounded-circle" />
                        @else
                            <!-- Menggunakan ikon default dari Bootstrap Icons -->
                            <i class="bi bi-person-circle" style="font-size: 20px;"></i>
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Image Icon -->


                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6> <!-- Mengambil nama pengguna dari database -->
                            <span>{{ Auth::user()->role_id == 1 ? 'Seller' : 'User' }}</span>
                            <!-- Menampilkan role berdasarkan role_id -->
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('home') }}">
                                <i class="bi bi-shop"></i> <!-- Ikon untuk marketplace -->
                                <span>Marketplace</span> <!-- Menambahkan item Marketplace -->
                            </a>
                        </li> --}}

                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item d-flex align-items-center" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-heading">PRODUK</li>

            <li class="nav-item">
                <a class="nav-link off" href="{{ url('tambah-produk') }}">
                    <svg id="fi_12023797" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" width="25"
                        height="25">
                        <path
                            d="m59.71074 25.51745-5.40119-5.40071a1.20037 1.20037 0 0 0 -.25981-.18753l-9.32074-4.66085a1.00043 1.00043 0 0 0 -.89466 1.78933l7.53139 3.76619-19.36614 9.68312-19.36617-9.68312 7.5314-3.76619a1.00048 1.00048 0 0 0 -.89467-1.78933l-9.32072 4.66085a1.207 1.207 0 0 0 -.2598.18753l-5.4012 5.40071a1.00753 1.00753 0 0 0 .25981 1.6018l4.84837 2.42431v18.28434a1 1 0 0 0 .55282.89466l21.60282 10.80144a1.0013 1.0013 0 0 0 .89467 0l21.60282-10.80144a1 1 0 0 0 .55282-.89466v-18.28434l4.84838-2.42431a1.00754 1.00754 0 0 0 .2598-1.6018zm-53.02644.43317 3.90976-3.90976 19.717 9.85858-3.91 3.91007zm24.31514 31.06029-19.60253-9.80127v-16.66587l14.75415 7.37738a1.00332 1.00332 0 0 0 1.15447-.18753l3.69391-3.69391zm21.60282-9.80127-19.60252 9.80127v-22.9712l3.6939 3.69391a1.001 1.001 0 0 0 1.15447.18753l14.75415-7.37738zm-15.00418-11.40013-3.91-3.91007 19.717-9.85858 3.90976 3.90976z">
                        </path>
                        <path
                            d="m27.88862 14.823h3.11082v3.1113a1.00015 1.00015 0 1 0 2.0003 0v-3.1113h3.11081a1.00015 1.00015 0 0 0 0-2.0003h-3.11081v-3.11131a1.00015 1.00015 0 1 0 -2.0003 0v3.1113h-3.11082a1.00034 1.00034 0 0 0 0 2.00031z">
                        </path>
                        <path
                            d="m31.99959 23.32425a9.51222 9.51222 0 0 0 9.50141-9.50141c-.522-12.60491-18.48273-12.60124-19.00283.00006a9.51221 9.51221 0 0 0 9.50142 9.50135zm0-17.00253a7.50932 7.50932 0 0 1 7.50111 7.50112c-.352 9.92787-14.65184 9.9253-15.00223-.00013a7.50929 7.50929 0 0 1 7.50112-7.50099z">
                        </path>
                    </svg>
                    <span class="menu-text">Tambah Produk</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('daftar-produk') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" id="fi_3875734" data-name="Layer 1" viewBox="0 0 512 512"
                        width="22" height="22">
                        <path
                            d="M171.875,72.714a8,8,0,0,1-.547,11.3l-13.356,12.12v46.826a8,8,0,0,1-8,8h-92.9a8,8,0,0,1-8-8V57.069a8,8,0,0,1,8-8h92.9a8,8,0,0,1,0,16h-84.9v69.892h76.9V110.656l-14.867,13.492a8,8,0,0,1-11.033-.268L97.864,105.673a8,8,0,1,1,11.313-11.314L122,107.178l38.579-35.011A8,8,0,0,1,171.875,72.714Zm-11.3,155.438L122,263.163l-12.819-12.819a8,8,0,1,0-11.313,11.314l18.208,18.208a8,8,0,0,0,11.033.267l14.867-13.492v24.3h-76.9V221.054h84.9a8,8,0,0,0,0-16h-92.9a8,8,0,0,0-8,8v85.891a8,8,0,0,0,8,8h92.9a8,8,0,0,0,8-8V252.121L171.328,240a8,8,0,0,0-10.753-11.848Zm0,155.986L122,419.148l-12.819-12.819a8,8,0,1,0-11.313,11.315l18.208,18.208a8,8,0,0,0,11.033.266l14.867-13.492v24.305h-76.9V377.039h84.9a8,8,0,0,0,0-16h-92.9a8,8,0,0,0-8,8v85.892a8,8,0,0,0,8,8h92.9a8,8,0,0,0,8-8V408.106l13.356-12.121a8,8,0,0,0-10.753-11.847ZM201.98,65.069H305.909a8,8,0,0,0,0-16H201.98a8,8,0,0,0,0,16Zm0,42.946H305.909a8,8,0,0,0,0-16H201.98a8,8,0,0,0,0,16Zm0,113.04H305.909a8,8,0,0,0,0-16H201.98a8,8,0,1,0,0,16Zm0,42.945H305.909a8,8,0,0,0,0-16H201.98a8,8,0,0,0,0,16Zm46.93,97.039H201.98a8,8,0,0,0,0,16h46.93a8,8,0,1,0,0-16Zm0,42.945H201.98a8,8,0,1,0,0,16h46.93a8,8,0,1,0,0-16ZM512,331.9V446.633a8,8,0,0,1-4,6.928l-99.363,57.367a8,8,0,0,1-8,0l-37.658-21.743V504a8,8,0,0,1-8,8H8a8,8,0,0,1-8-8V8A8,8,0,0,1,8,0H354.979a8,8,0,0,1,8,8V289.347L400.637,267.6a8,8,0,0,1,8,0L508,324.972A8,8,0,0,1,512,331.9Zm-190.725,0,83.362,48.128L488,331.9l-83.363-48.13Zm-8,110.114,83.362,48.13v-96.26l-83.362-48.129Zm33.7,37.934-45.7-26.387a8,8,0,0,1-4-6.928V331.9a8,8,0,0,1,4-6.927l45.7-26.388V16H16V496H346.979ZM496,442.014V345.755l-83.363,48.129v96.26Z">
                        </path>
                    </svg>
                    <span class="menu-text">Daftar Produk</span>
                </a>
            </li>

            <li class="nav-heading">PESANAN</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('seller.daftarPesanan') }}">
                    <svg version="1.1" id="fi_839860" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.891 438.891"
                        style="enable-background: new 0 0 438.891 438.891" xml:space="preserve" width="22"
                        height="22">
                        <g>
                            <g>
                                <g>
                                    <path d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347
                                c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923
                                c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045
                                c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735
                                c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51
                                c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808
                                H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645
                                c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706
                                c12.009,0.22,21.922,9.456,22.988,21.42V399.185z"></path>
                                    <path d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                C179.628,233.962,179.427,233.761,179.217,233.569z"></path>
                                    <path d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z"></path>
                                    <path d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629
                                c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                C179.628,150.37,179.427,150.169,179.217,149.977z"></path>
                                    <path d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z"></path>
                                    <path d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629
                                c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135
                                c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025
                                C179.628,317.554,179.427,317.353,179.217,317.16z"></path>
                                    <path d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16
                                c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="menu-text">Daftar Pesanan</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
