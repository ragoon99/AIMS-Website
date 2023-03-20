@extends('layouts/dashboardLayout')

@section('title', 'Farmers')

@section('content')
<div class="container">
    <div class="border-bottom">
        <h1>Farmer's Data</h1>
    </div>

    <div class="mt-3">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <td>SN</td>
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Date of Birth</td>
                <td>Address</td>
                <td>Province</td>
                <td>State</td>
                <td>Images</td>
                <td>Operations</td>
            </thead>
            <tbody>
                @foreach($datas as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data['fname'] }}</td>
                    <td>{{ $data['mname'] }}</td>
                    <td>{{ $data['lname'] }}</td>
                    <td>{{ $data['age'] }}</td>
                    <td>{{ $data['sex'] }}</td>
                    <td>{{ $data['dob'] }}</td>
                    <td>{{ $data['address'] }}</td>
                    <td>{{ $data['province'] }}</td>
                    <td>{{ $data['state'] }}</td>
                    <td><img src="{{asset("images/seed/".$data['imgName'])}}" height="160px" width="160px"></td>
                    <td>
                        <a href="{{ 'fEdit/'.$data['id'] }}">Edit</a> | <a href="{{ 'fDelete/'.$data['id'] }}">Delete</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="btn btn-success btn-lg btn-block" href="farmerExcel">Excel Sheet</a>
    <a class="btn btn-success btn-lg btn-block" href="farmerPDF">PDF</a>
    <a class="btn btn-success btn-lg btn-block" href="{{ route('farmer.create') }}">Add</a>
    <a class="btn btn-success btn-lg btn-block" href="javascript:history.back()">Back</a>
</div>
@endsection
