@extends('layouts/adminLayout')

@section('title', 'Dashboard')

@section('head')
    <b>
        AIMS - Dashboard
    </b>

    <div>
        <p class="uName" name="uName">
            {{session('fname')}} {{session('lname')}}
        </p>
    </div>

    <div class="dropdown">
        <a href="#" class="iconDropdown">
            <img src="uIcon.png" alt="User Icon">
        </a>
        <div class="dropdown-content">
            <a href="logout">Logout</a>
        </div>
    </div>

    <br>
@endsection

@section('content')
    <div>
        <div>
            <a class="" href="/">View the Homepage</a>
        </div>

        <div>
            <a class="" href="database">View the database</a>
        </div>

        <div>
            <a class="" href="{{ route('asc.index') }}">Account Settings</a>
        </div>
    </div>
@endsection
