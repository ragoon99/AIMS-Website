@extends('layouts/databaseLayout')

@section('title', 'Edit Equipment')

@section('content')

    <form action="{{ route('equipment.update', $data['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$data['id']}}" name="id">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$data['name']}}" id="name">

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('equipment.create') }}">Add</a>

@endsection
