@extends('layouts/dashboardLayout')

@section('title', 'Crop Database')

@section('content')

<div class="container">
    <div class="border-bottom p-2">
        <h1>Crop Database</h1>
    </div>

    <div class="table-responsive mt-3">
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
                <td>Images</td>
                <td>Operation</td>
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
                    @if(session('user')=='admin')
                        <td><a href="{{ 'cDelete/'.$data['id'] }}">Delete</a> |
                            <a href="{{ 'cEdit/'.$data['id'] }}">Edit</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="btn btn-success btn-lg btn-block" href="cropExcel">Excel Sheet</a>
    <a class="btn btn-success btn-lg btn-block" href="cropPDF">PDF</a>
    <a class="btn btn-success btn-lg btn-block" href="{{ route('crop.create') }}">Add</a>
    <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
</div>


@endsection
