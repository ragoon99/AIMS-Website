@extends('admin/login')

@section('content')

<form action="" method="post">
    <label for="eid">Employee ID: </label>
    <input type="text" placeholder="Enter Your Employee ID" name="eid" id="eid">

    <br>

    <button type="submit">Submit</button>

    <br>

    <a href="admin">Want To Try Login Again?</a>
</form>

@endsection
