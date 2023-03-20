@extends('layouts/layout')

@section('title', 'Add Equipment Data')

@section('content')
<div class="container mb-5">
    <h1>Add Equipment Data</h1>
    <form action="{{ route('equipment.store') }}" method="post" class="border p-5">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" class="form-control"><br>
        @error('name')
            {{ $message }} <br>
        @enderror

        <label for="name">Market Rate Price: </label>
        <input type="text" name="mrp" id="mrp" class="form-control"> <br>
        @error('mrp')
            {{ $message }} <br>
        @enderror

        <label for="image">Picture: </label>
        <input type="file" name="image" id="image" class="form-control"><br>
        @error('image')
            {{ $message }} <br>
        @enderror

        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
    </form>
</div>
@endsection
