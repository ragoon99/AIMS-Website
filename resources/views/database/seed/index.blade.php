@extends('layouts/layout')

@section('title', 'Seed Database')

@section('content')

<div class="container mt-3 border-bottom">
    <h1>Seed Database</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Growth (in Days)</td>
                <td>Image</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['growth'] }}</td>
                <td><img src="{{asset("images/seed/".$data['imgName'])}}" height="160px" width="160px"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="clearfix mb-3">
        <a class="btn btn-success btn-lg btn-block" href="seedExcel">Excel Sheet</a>
        <a class="btn btn-success btn-lg btn-block" href="seedPDF">PDF</a>
        @if(session('user') == 'normal')
            <a class="btn btn-success btn-lg float-right" href="{{ route('seed.create') }}">Add Seed</a>
        @endif
    </div>
</div>

@endsection
