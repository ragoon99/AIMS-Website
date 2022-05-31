@extends('layouts/adminLayout')

@section('title', 'Admin Login')

@section('content')

<div>
    <div>
        <form action="Auth" method="POST">
            @csrf
            <div>
                <label for="employeeID">Employee ID</label>
                <input maxlength=7 placeholder="Employee ID" value="{{ old('employeeID') }}" type="text" name="id" id="id">
                @error('id')
                    <div class="error-msg">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div>
                <label for="passphrase">Password</label>
                <input placeholder="Password" type="password" name="passphrase" id="passphrase">
                @if (isset($msg))
                    {{"Wrong Password"}}
                @else
                    {{$msg=NULL}}
                @endif
                @error('passphrase')
                    <div class="error-msg">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <a href="passReset">Forgot Your Password?</a>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
