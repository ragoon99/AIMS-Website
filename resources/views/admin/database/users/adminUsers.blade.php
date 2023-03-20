@extends('layouts/dashboardLayout')

@section('title', 'Employee Sheet')

@section('content')
<div class="container">
    <div class="border-bottom">
        <h1>Employee Database</h1>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>SN</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Employee ID</td>
                    <td>Images</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['fname'] }}</td>
                    <td>{{ $data['lname'] }}</td>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['eid'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
