@extends('layouts/databaseLayout')

@section('title', 'Employee Sheet')

@section('content')
    <table border="1">
        <tr>
            <td>SN</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Employee ID</td>
        </tr>
            @foreach ($datas as $data)
            <tr>
                <td>{{$data['id']}}</td>
                <td>{{$data['fname']}}</td>
                <td>{{$data['lname']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['eid']}}</td>
            </tr>
            @endforeach
    </table>
@endsection
