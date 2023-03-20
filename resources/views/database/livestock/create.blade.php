@extends('layouts/layout')

@section('title', 'Add Livestock Data')

@section('content')
<div class="container mb-5">
    <h1>Add a Livestock Data</h1>

    <form action="{{ route('livestock.store') }}" method="post" class="border p-5">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control"><br>
        @error('name')
            {{ $message }} <br>
        @enderror

        <div class="row">
            <div class="col">
                <label for="mrp">Market Rate Price: </label>
                <input type="text" name="mrp" id="mrp" class="form-control"><br>
                @error('mrp')
                    {{ $message }} <br>
                @enderror
            </div>

            <div class="col">
                <label for="frp">Farmers Rate Price</label>
                <input type="text" name="frp" id="frp" class="form-control"><br>
                @error('frp')
                    {{ $message }} <br>
                @enderror
            </div>
        </div>

        <label for="image">Picture: </label>
        <input type="file" name="image" id="image" class="form-control"><br>
        @error('image')
            {{ $message }} <br>
        @enderror

        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
    </form>
</div>
@endsection
