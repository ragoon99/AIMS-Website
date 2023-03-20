@extends('layouts/adminLayout')

@section('title', 'Admin Login')

@section('head')
    <nav class="navbar navbar-dark bg-dark shadow-sm p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Agriculture Information Management System
            </a>
        </div>
    </nav>

@endsection

@section('content')

<div class="wrapper">
    <div class="d-flex justify-content-center pt-5">
        <div class="shadow">
            <form class="adminLoginForm" action="Auth" method="post">
                @csrf
                <span class="d-flex justify-content-center m-5">
                    <h2>Admin Login Page</h2>
                </span>

                <div class="form-floating mb-3">
                    <input class="form-control" id="floatingInput" placeholder="Employee ID" name="id" value="{{ old('id') }}">
                    <label for="floatingInput">Employee ID</label>
                </div>

                @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>

                @if (session()->has('status'))
                    <div class="text-danger">
                        {{ session('status') }}
                    </div>
                @endif

                @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div>

                    </div>
                    <div>
                        <a href="{{ route('passReset') }}" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="loginFormBtnContain">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
