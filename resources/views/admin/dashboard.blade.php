@extends('layouts/dashboardLayout')

@section('content')

<div class="border-bottom p-2 d-flex">
    <h1>
        Admin Panel
    </h1>
    <div class="align-self-center ms-auto p-2 bd-highlight">
        <span>{{ session('fname')}} {{ session('lname') }}</span>
    </div>
</div>

<div class="p-2 text-center mt-5">
    <div class="row mb-5">
        <a href="/" class="col text-decoration-none p-2 text-dark"><i class='bx bx-home' style='color:#2ad015; font-size: 90px'></i>
            <div class="d-block mt-3">
                <span>Homepage</span>
            </div>
        </a>
        <a href="#" class="col text-decoration-none p-2 text-dark"><i class='bx bx-envelope' style='color:#2ad015; font-size: 90px'></i>
            <div class="d-block mt-3">
                Mail (WIP)
            </div>
        </a>
        <a href="#" class="col text-decoration-none p-2 text-dark"><i class='bx bxs-data' style='color:#2ad015; font-size: 90px'></i>
            <div class="d-block mt-3">
                See Database
            </div>
        </a>
    </div>
    <div class="row mb-3">
        <a href="#" class="col text-decoration-none p-2 text-dark"><i class='bx bxs-user-plus' style='color:#2ad015; font-size: 90px'></i>
            <div class="d-block mt-3">
                Add a Farmer
            </div>
        </a>
        <a href="#" class="col text-decoration-none p-2 text-dark"><i class='bx bxs-bell' style='color:#2ad015; font-size: 90px'></i>
            <div class="d-block mt-3">
                Notification (WIP)
            </div>
        </a>
        <a href="#" class="col text-decoration-none p-2 text-dark"><i class='bx bxs-cog' style='color:#2ad015; font-size: 88px'></i>
            <div class="d-block mt-3">
                Settings
            </div>
        </a>
    </div>
</div>

@endsection

