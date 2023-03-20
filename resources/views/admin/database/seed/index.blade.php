@extends('layouts/dashboardLayout')

@section('title', 'Seed Database')

@section('content')
<div class="container">
    <div class="border-bottom p-2">
        <h1>Seed Database</h1>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover" >
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Growth (in Days)</td>
                <td>Image</td>
                <td>Operation</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['growth'] }}</td>
                    <td><img src="{{asset("images/seed/".$data['imgName'])}}" height="160px" width="160px"></td>
                    <td><a href="{{ 'sDelete/'.$data['id'] }}">Delete</a> |
                        <a href="{{ 'sEdit/'.$data['id'] }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <a class="btn btn-success btn-lg btn-block" href="seedExcel">Excel Sheet</a>
    <a class="btn btn-success btn-lg btn-block" href="seedPDF">PDF</a>
    <a class="btn btn-success btn-lg btn-block" href="{{ route('seed.create') }}">Add</a>
    <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
</div>
@endsection
