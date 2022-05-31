@extends('layouts/databaseLayout')

@section('title', 'Seed Database')

@section('content')

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Operation</td>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data['name']}}</td>
            <td><a href="{{ 'sDelete/'.$data['id'] }}">Delete</a> |
                <a href="{{ 'sEdit/'.$data['id'] }}">Edit</a></td>
        </tr>
        @endforeach
        </td>
    </table>

    <a href="{{ route('seed.create') }}">Add</a>

@endsection
