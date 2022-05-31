@extends('layouts/dabaseLayout')

@section('title', '{{$data['name']}}')

@section('content')

    <div>
        <label for="">Name</label>
        {{$data['name']}}
    </div>

@endsection
