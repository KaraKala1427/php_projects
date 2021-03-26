@extends('layouts.standard')

@section('title-block'){{$data->name}}@endsection

@section('content')
<h1>Message</h1>
    <div class="alert alert-info">
        <h3>{{ $data->message}}</h3>
        <p>{{ $data->email}} - {{ $data->name}}</p>
        <p><small>{{ $data->created_at}}</small></p>
        <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-primary">Edit</button></a>
        <a href="{{ route('contact-delete', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
    </div>
@endsection