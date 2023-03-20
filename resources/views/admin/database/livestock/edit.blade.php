@extends('layouts/dashboardLayout')

@section('title', 'Edit Livestock')

@section('content')
<div class="container">
    <div class="border-bottom p-2">
        <h1>Edit Livestock Data</h1>
    </div>

    <form action="{{ route('livestock.update', $data['id']) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $data['id'] }}" name="id">

        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="name" value="{{ $data['name'] }}" id="name"><br>
            <label for="name">Name</label>
        </div>

        <div class="row mb-3">
            <div class="form-floating col">
                <input class="form-control" type="text" name="mrp" value="{{ $data['mrp'] }}" id="mrp"><br>
                <label for="mrp">Market Rate Price</label>
            </div>

            <div class="form-floating col">
                <input class="form-control" type="text" name="frp" value="{{ $data['frp'] }}" id="frp"><br>
                <label for="frp">Farmers Rate Price</label>
            </div>
        </div>

        <label for="image">Picture: </label>
        <input type="file" name="image" id="image" value="{{ $data['imgName'] }}" class="form-control"><br>
        @error('image')
            {{ $message }} <br>
        @enderror

        <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
        <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
    </form>
</div>
@endsection
