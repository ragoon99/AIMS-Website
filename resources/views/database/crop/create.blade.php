@extends('layouts/layout')

@section('title', 'Add Crop Data')

@section('content')
<div class="container">
    <h1>Add Crop Data</h1>
    <form action="{{ route('crop.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Crop Name" name="crop">
            <label for="floatingInput">Name</label>
        </div>
        @error('crop')
            {{ $message }} <br>
        @enderror

        <div class="row">
            <div class="form-floating col">
                <select class="form-select" name="province" id="floatingSelect">
                    Province:
                    <option value="-">--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <label for="floatingSelect">Province</label>
            </div>
            @error('province')
                {{ $message }} <br>
            @enderror

            <div class="form-floating col">
                <input class="form-control" type="text" name="municipality" placeholder="Municipality Name" id="floatingInput"><br>
                <label for="floatingInput">Municipality </label>
            </div>
            @error('municipality')
                {{ $message }} <br>
            @enderror

            <div class="form-floating col">
                <input class="form-control" type="text" name="ward" placeholder="Ward No." id="floatingInput"><br>
                <label for="floatingInput">Ward</label>
            </div>
            @error('ward')
                {{ $message }} <br>
            @enderror
        </div>

        <div class="row">
            <div class="col form-floating">
                <input class="form-control" type="text" placeholder="MRP" name="mrp" id="floatingInput"><br>
                <label for="floatingInput">Market Rate Price </label>
            </div>
            @error('mrp')
                {{ $message }} <br>
            @enderror

            <div class="form-floating col">
                <input class="form-control" type="text" placeholder="FRP" name="frp" id="floatingInput"><br>
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
    </form>
</div>
@endsection
