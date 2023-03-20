@extends('layouts/dashboardLayout')

@section('title', 'Equipment Database')

@section('content')

<div class="container">
    <div class="border-bottom p-2">
        <h1>Equipment Database</h1>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Market Rate Price</td>
                <td>Images</td>
                <td>Operation</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data['name']}}</td>
                    <td>Rs. {{$data['mrp']}}</td>
                    <td><img src="{{asset("images/equipment/".$data['imgName'])}}" height="160px" width="160px"></td>
                    <td><a href="{{ 'eDelete/'.$data['id'] }}">Delete</a> |
                        <a href="{{ 'eEdit/'.$data['id'] }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <a class="btn btn-success btn-lg btn-block" href="equipmentExcel">Excel Sheet</a>
    <a class="btn btn-success btn-lg btn-block" href="equipmentPDF">PDF</a>
    <a class="btn btn-success btn-lg btn-block" href="{{ route('equipment.create') }}">Add</a>
    <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
</div>


@endsection
