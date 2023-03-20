@extends('layouts/layout')

@section('title', 'Equipment Database')

@section('content')

<div class="container mt-3 border-bottom">
    <h1>Equipment Database</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Market Rate Price</td>
                <td>Image</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data['name']}}</td>
                <td>Rs. {{$data['mrp']}}</td>
                <td><img src="{{asset("images/equipment/".$data['imgName'])}}" height="160px" width="160px"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clearfix mb-3">
        <a class="btn btn-success btn-lg btn-block" href="equipmentExcel">Excel Sheet</a>
        <a class="btn btn-success btn-lg btn-block" href="equipmentPDF">PDF</a>
        @if(session('user') == 'normal')
            <a class="btn btn-success btn-lg float-right" href="{{ route('equipment.create') }}">Add Equipment</a>
        @endif
    </div>
</div>

@endsection
