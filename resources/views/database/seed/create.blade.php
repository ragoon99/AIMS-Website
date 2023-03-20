@extends('layouts/layout')

@section('title', 'Add Seed Data')

@section('content')
<div class="container mb-5">
    <h1>
        Add Crop
    </h1>
    <form action="{{ route('seed.store') }}" enctype="multipart/form-data" method="post" class="border p-5">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter Crop Name" class="form-control"> <br>
        @error('name')
            {{ $message }} <br>
        @enderror

        <label for="growth">Growth (In Days): </label>
        <input type="text" name="growth" id="growth" placeholder="Growth" class="form-control"> <br>
        @error('growth')
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
