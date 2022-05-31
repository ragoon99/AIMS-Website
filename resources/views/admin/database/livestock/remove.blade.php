@extends('layouts/databaseLayout')

@section('title', 'Livestock Database')

@section('content')

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <td>{{$data['id']}}</td>
            <td>{{$data['name']}}</td>
            <td><a href={{ 'lDelete/'.$data['id'] }}>Delete</a></td>
        </tr>
        @endforeach
        </td>
    </table>

@endsection
