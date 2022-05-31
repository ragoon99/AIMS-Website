@extends('admin/dashboard')

@section('content')
    @if ($which=='email')
        <div>
            <form action="{{ route('asc.update', $which) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" value="email" name="which">
                <label for="email">New Email: </label>
                <input type="text" placeholder="Enter Your New Email" value="{{ old('email') }}" name="nEmail" id="nEmail">
                @error('nEmail')
                {{$message}}
                @enderror
                <br>
                <label for="password">Password: </label>
                <input type="password" placeholder="Enter Your Password" name="passphrase" id="passphrase">
                @error('passphrase')
                {{$message}}
                @enderror
                <br>
                <button type="submit">Change</button>
            </form>
        </div>
    @elseif ($which=='password')
        <div>
            <form action="{{ route('asc.update', $which) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" value="passphrase" name="which">
                <label for="oldPassphrase">Current Password: </label>
                <input type="password" placeholder="Enter Your Current Password" name="oldPassphrase" id="oldPassphrase">
                <br>
                <label for="newPassword">New Password: </label>
                <input type="password" placeholder="Enter Your New Password" name="newPassword" id="newPassword">
                <br>
                <label for="password">Re-Type Password: </label>
                <input type="password" placeholder="Re-Type Your New Password" name="rePassword" id="rePassword">
                <br>
                <button type="submit">Change</button>
            </form>
        </div>
    @endif
@endsection
