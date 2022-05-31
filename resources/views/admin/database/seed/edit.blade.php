@extends('layouts/databaseLayout')

@section('title', 'Edit Seed')

@section('content')

    <form action="{{ route('seed.update', $data['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$data['id']}}" name="id">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$data['name']}}" id="name">

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('seed.create') }}">Add</a>

@endsection
