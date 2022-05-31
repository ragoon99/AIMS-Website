@extends('layouts/databaseLayout')

@section('title', 'Edit Livestock')

@section('content')

    <form action="{{ route('livestock.update', $data['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$data['id']}}" name="id">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$data['name']}}" id="name">

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('livestock.create') }}">Add</a>

@endsection
