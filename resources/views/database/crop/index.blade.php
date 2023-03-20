@extends('layouts/layout')

@section('title', 'Crop Database')

@section('content')

<div class="container">
    <div class="box d-flex align-items-center border-bottom">
        <div class="d-inline-block mt-3">
            <h1>Crop Database</h1>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Province</td>
                <td>Municipality</td>
                <td>Ward</td>
                <td>Market Rate Price</td>
                <td>Farmers Rate Price</td>
                <td>Image</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['province'] }}</td>
                <td>{{ $data['municipality'] }}</td>
                <td>{{ $data['ward'] }}</td>
                <td>Rs. {{ $data['mrp'] }}</td>
                <td>Rs. {{ $data['frp'] }}</td>
                <td><img src="{{asset("images/crop/".$data['imgName'])}}" height="160px" width="160px"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clearfix mb-3">
        <a class="btn btn-success btn-lg btn-block" href="cropExcel">Excel Sheet</a>
        <a class="btn btn-success btn-lg btn-block" href="cropPDF">PDF</a>

        @if(session('user') == 'normal')
            <a class="btn btn-success btn-lg float-right" href="{{ route('crop.create') }}">Add Crop</a>
        @endif
    </div>
</div>

@endsection
