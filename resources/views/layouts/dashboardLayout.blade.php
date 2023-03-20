<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset("css/bootstrap.css") }}" rel="stylesheet" >
    <link href="{{ asset("css/style.css") }}" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
        a:hover + a.div:hover + li:hover + ul:hover {
            color:#1aa707;
        }
    </style>
</head>

<body class="d-flex">
    <div class="d-flex">
        <div class="border-end" style="width: 320px; height: 700px">
            <a href="adminDash" class="d-flex align-items-center p-3 mb-3 link-dark text-decoration-none border-bottom bg-dark">
                <span class="fs-5 fw-semibold p-3" style="color: white;">AIMS Dashboard</span>
            </a>

            <ul class="list-unstyled ps-0 m-2 d-block">
                <li class="mb-2">
                    <a href="adminDash" class="btn btn-toggle align-items-center">Dashboard</a>
                </li>

                <li class="mb-2">
                    <button class="btn btn-toggle align-items-center" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Database
                    </button>
                    <div class="collapse ms-4" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 text-decoration-none">
                            <li class="mb-1"><a href="{{ route('crop.index') }}" class="link-dark text-decoration-none rounded">Crop</a></li>
                            <li class="mb-1"><a href="{{ route('seed.index') }}" class="link-dark text-decoration-none rounded">Seed</a></li>
                            <li class="mb-1"><a href="{{ route('equipment.index') }}" class="link-dark text-decoration-none rounded">Equipment</a></li>
                            <li class="mb-1"><a href="{{ route('livestock.index') }}" class="link-dark text-decoration-none rounded">Livestock</a></li>
                            <li class="mb-1"><a href="{{ route('farmer.index') }}" class="link-dark text-decoration-none rounded">Farmers</a></li>
                            <li class="mb-1"><a href="empData" class="link-dark text-decoration-none rounded">Employee List</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-2">
                    <a href="/" class="btn btn-toggle align-items-center">Homepage</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-2">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse ms-4" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 text-decoration-none">
                            <li class="mb-1"><a href="#" class="link-dark rounded">Profile (WIP)</a></li>
                            <li class="mb-1"><a href="{{ route('asc.index') }}" class="link-dark rounded">Settings</a></li>
                            <li class="mb-1"><a href="logout" class="link-dark rounded">Sign out</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
            </div>
        </div>

        <div class="p-3" style="width: 100%; height:100%;">
            <div class="container">
                @if(session()->has('success'))
                    <div class="p-3 mb-2 bg-success text-white">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session()->has('failed'))
                    <div class="p-3 mb-2 bg-danger text-white">
                        {{ session('failed') }}
                    </div>
                @endif
            </div>

            @yield('content')
        </div>
    </div>
</body>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>
