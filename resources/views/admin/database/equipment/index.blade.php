@extends('layouts/databaseLayout')

@section('title', 'Equipment Database')

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
            <td><a href="{{ 'eDelete/'.$data['id'] }}">Delete</a> |
                <a href="{{ 'eEdit/'.$data['id'] }}">Edit</a></td>
        </tr>
        @endforeach
        </td>
    </table>

    <a href="{{ route('equipment.create') }}">Add</a>

@endsection
