@extends('layouts/databaseLayout')

@section('title', 'Add Weather Data')

@section('content')
<form action="{{ route('weather.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name">

    <button type="submit">Submit</button>
</form>
@endsection
