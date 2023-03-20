@extends('layouts/dashboardLayout')

@section('title', 'Dashboard')

@section('content')
<div class="border-bottom p-2">
    <h1>
        Account Settings
    </h1>
</div>

@if(session()->has('success'))
    <div class="p-3 mb-2 bg-success text-white">
        {{ session('success') }}
    </div>
@endif

<div class="mt-3 p-2">
    <label for="name" class="mb-2">Name: {{$data['fname']}} {{ $data['lname'] }}</label> <br>
    <label for="email" class="mb-2">Email: {{$data['email']}}</label> <br> <br>
    <a href="#" class="mb-2">Change Profile Picture (WIP)</a> <br>
    <a href="{{ route('asc.edit', 'email') }}" class="mb-3">Change E-Mail</a> <br>
    <a href="{{ route('asc.edit', 'password') }}" class="mb-3">Change Password</a>
</div>
@endsection
