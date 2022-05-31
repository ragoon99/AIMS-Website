@extends('admin/dashboard')

@section('title', 'Dashboard')

@section('content')
<div>
    <label for="name">Name: {{$data['fname']}} {{ $data['lname'] }}</label> <br>
    <label for="email">Email: {{$data['email']}}</label> <br> <br>
    <a href="">Change Profile Picture</a> <br>
    <a href="{{ route('asc.edit', 'email') }}">Change E-Mail</a> <br>
    <a href="{{ route('asc.edit', 'password') }}">Change Password</a>
</div>

<br>

<div>
    <a href="adminDash">Return To Dashboard</a>
</div>
@endsection
