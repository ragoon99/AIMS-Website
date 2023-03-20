@extends('admin/dashboard')

@section('content')
    @if ($which == 'email')
        <div>
            <form action="{{ route('asc.update', $which) }}" method="post">
                @csrf
                @method('PUT')

                @if(session()->has('error'))
                    <div class="p-3 mb-2 bg-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif

                <input type="hidden" value="email" name="which">
                <label for="nEmail">New Email: </label>
                <input type="text" placeholder="Enter Your New Email" value="{{ old('email') }}" name="nEmail" id="nEmail">

                @error('nEmail')
                <br>{{$message}}
                @enderror

                <br>
                <label for="password">Password: </label>
                <input type="password" placeholder="Enter Your Password" name="passphrase" id="passphrase">

                @error('password')
                <br>{{$message}}
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

                @if(session()->has('error'))
                    <div class="p-3 mb-2 bg-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif

                <input type="hidden" value="password" name="which">
                <label for="oldPassword">Current Password: </label>
                <input type="password" placeholder="Enter Your Current Password" name="oldPassword" id="oldPassword">

                @error('oldPassword')
                <br>{{$message}}<br>
                @enderror

                <br>

                <label for="newPassword">New Password: </label>
                <input type="password" placeholder="Enter Your New Password" name="newPassword" id="newPassword">

                @error('newPassword')
                <br>{{$message}}<br>
                @enderror

                <br>

                <label for="password">Re-Type Password: </label>
                <input type="password" placeholder="Re-Type Your New Password" name="rePassword" id="rePassword">

                @error('rePassword')
                <br>{{$message}}<br>
                @enderror

                <br>

                <button type="submit">Change</button>
            </form>
        </div>
    @endif
@endsection
