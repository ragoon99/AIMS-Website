@extends('admin/login')

@section('content')
<div>
    <p>
        <b>
            Reset Your Password
        </b>
    </p>
</div>

<div>
    <form action="" method="post">
        <label for="eid">Employee ID: </label>
        <input type="text" name="id" id="id" placeholder="Enter your Employee ID" value="{{ old('id') }}">

        <br>

        <button type="submit">Submit</button>

        <br>

        <a href="admin">Want To Try Login Again?</a>
    </form>
</div>

@endsection
