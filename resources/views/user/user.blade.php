<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyTani</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        body {
            background-color: #f5f5f5;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #4caf50;
            padding: 10px 20px;
            color: #fff;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .search-bar {
            flex: 1;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home') }}">
                        <span class="logo" style="color: white;">MyTani</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Temukan Barang atau Benih Pertanian Anda" />
        </div>
        <div class="user-actions">
            <a href="{{ url('keranjang') }}" class="btn">
                <i class="fa fa-shopping-cart" style="font-size: 24px; color: white"></i>
            </a>
            <div class="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" width="40" height="40"
                    data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <path style="fill: #e7eced"
                        d="M18.613,41.552l-7.907,4.313c-0.464,0.253-0.881,0.564-1.269,0.903C14.047,50.655,19.998,53,26.5,53 c6.454,0,12.367-2.31,16.964-6.144c-0.424-0.358-0.884-0.68-1.394-0.934l-8.467-4.233c-1.094-0.547-1.785-1.665-1.785-2.888v-3.322 c0.238-0.271,0.51-0.619,0.801-1.03c1.154-1.63,2.027-3.423,2.632-5.304c1.086-0.335,1.886-1.338,1.886-2.53v-3.546 c0-0.78-0.347-1.477-0.886-1.965v-5.126c0,0,1.053-7.977-9.75-7.977s-9.75,7.977-9.75,7.977v5.126 c-0.54,0.488-0.886,1.185-0.886,1.965v3.546c0,0.934,0.491,1.756,1.226,2.231c0.886,3.857,3.206,6.633,3.206,6.633v3.24 C20.296,39.899,19.65,40.986,18.613,41.552z">
                    </path>
                    <g>
                        <path style="fill: #556080"
                            d="M26.953,0.004C12.32-0.246,0.254,11.414,0.004,26.047C-0.138,34.344,3.56,41.801,9.448,46.76 c0.385-0.336,0.798-0.644,1.257-0.894l7.907-4.313c1.037-0.566,1.683-1.653,1.683-2.835v-3.24c0,0-2.321-2.776-3.206-6.633 c-0.734-0.475-1.226-1.296-1.226-2.231v-3.546c0-0.78,0.347-1.477,0.886-1.965v-5.126c0,0-1.053-7.977,9.75-7.977 s9.75,7.977,9.75,7.977v5.126c0.54,0.488,0.886,1.185,0.886,1.965v3.546c0,1.192-0.8,2.195-1.886,2.53 c-0.605,1.881-1.478,3.674-2.632,5.304c-0.291,0.411-0.563,0.759-0.801,1.03V38.8c0,1.223,0.691,2.342,1.785,2.888l8.467,4.233 c0.508,0.254,0.967,0.575,1.39,0.932c5.71-4.762,9.399-11.882,9.536-19.9C53.246,12.32,41.587,0.254,26.953,0.004z">
                        </path>
                    </g>
                </svg>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('user.profile')}}">Akun Saya</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.pesanan') }}">Pesanan Saya</a></li>
                    {{-- <li><a class="dropdown-item" href="{{ route('user.tracking') }}">Toko Saya</a></li> --}}
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
