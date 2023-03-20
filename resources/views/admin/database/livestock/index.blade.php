@extends('layouts/dashboardLayout')

@section('title', 'Livestock Database')

@section('content')
<div class="container">
    <div class="border-bottom p-2">
        <h1>Livestock Data</h1>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Market Rate Price</td>
                    <td>Farmers Rate Price</td>
                    <td>Images</td>
                    <td>Operation</td>
                </tr>
            </thead>

            @foreach ($datas as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data['name']}}</td>
                    <td>Rs. {{$data['mrp']}}</td>
                    <td>Rs. {{$data['frp']}}</td>
                    <td><img src="{{asset("images/livestock/".$data['imgName'])}}" height="160px" width="160px"></td>
                    <td><a href="{{ 'lDelete/'.$data['id'] }}">Delete</a> |
                        <a href="{{ 'lEdit/'.$data['id'] }}">Edit</a></td>
                </tr>
                @endforeach
                </td>
        </table>
    </div>


    <a class="btn btn-success btn-lg btn-block" href="livestockExcel">Excel Sheet</a>
    <a class="btn btn-success btn-lg btn-block" href="livestockPDF">PDF</a>
    <a class="btn btn-success btn-lg btn-block" href="{{ route('livestock.create') }}">Add</a>
    <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
</div>
@endsection
