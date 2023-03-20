@extends('layouts/dashboardLayout')

@section('title', 'Add Seed Data')

@section('content')
<div class="container">
    <div class="border-bottom p-2">
        <h1>
            Add Crop
        </h1>
    </div>

    <form action="{{ route('seed.store') }}" enctype="multipart/form-data"   method="post" class="mt-3">
        @csrf

        <div class="row mb-3">
            <div class="form-floating col">
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Crop Name">
                <label for="name">Name: </label>
            </div>
            @error('name')
                {{ $message }} <br>
            @enderror

            <div class="form-floating col ">
                <input class="form-control" type="text" name="growth" id="growth" placeholder="Growth">
                <label for="growth">Growth</label>
            </div>
            @error('growth')
                {{ $message }} <br>
            @enderror
        </div>

        <div class="form-label mb-3">
            <label for="image">Picture</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        @error('image')
            {{ $message }} <br>
        @enderror

        <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
        <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
    </form>
</div>
@endsection
