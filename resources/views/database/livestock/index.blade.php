@extends('layouts/layout')

@section('title', 'Livestock Database')

@section('content')

<div class="container mt-3">
    <h1>Livestock Data</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Market Rate Price</td>
                <td>Farmers Rate Price</td>
                <td>Image</td>
            </tr>
        </thead>
        @foreach ($datas as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data['name']}}</td>
            <td>Rs. {{$data['mrp']}}</td>
            <td>Rs. {{$data['frp']}}</td>
            <td><img src="{{asset("images/livestock/".$data['imgName'])}}" height="160px" width="160px"></td>
        </tr>
        @endforeach
        </td>
    </table>

    <div class="clearfix mb-3">
        <a class="btn btn-success btn-lg btn-block" href="livestockExcel">Excel Sheet</a>
        <a class="btn btn-success btn-lg btn-block" href="livestockPDF">PDF</a>
        @if(session('user') == 'normal')
            <a class="btn btn-success btn-lg float-right" href="{{ route('livestock.create') }}">Add Livestock</a>
        @endif
    </div>
</div>

@endsection
