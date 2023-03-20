@extends('layouts/dashboardLayout')

@section('title', 'Add Livestock Data')

@section('content')

<div class="container">
    <div class="border-bottom p-2">
        <h1>Add a Livestock Data</h1>
    </div>

    <form action="{{ route('livestock.store') }}" method="post" class="mt-3">
        @csrf
        <div class="form-floating">
            <input class="form-control" type="text" name="name" placeholder="Name" id="floatingInput"><br>
            <label for="floatingInput">Name</label>
        </div>
        @error('name')
            {{ $message }} <br>
        @enderror

        <div class="row">
            <div class="form-floating col">
                <input class="form-control" type="text" name="mrp" placeholder="MRP" id="floatingInput"><br>
                <label for="floatingInput">Market Rate Price</label>
            </div>
            @error('mrp')
                {{ $message }} <br>
            @enderror

            <div class="form-floating col">
                <input class="form-control" type="text" name="frp" placeholder="FRP" id="floatingInput"><br>
                <label for="floatingInput">Farmers Rate Price</label>
            </div>

            @error('frp')
                {{ $message }} <br>
            @enderror
        </div>

        <label for="image">Picture: </label>
        <input type="file" name="image" id="image" class="form-control"><br>
        @error('image')
            {{ $message }} <br>
        @enderror

        <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
        <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
    </form>
</div>

@endsection
