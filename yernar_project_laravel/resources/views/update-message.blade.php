@extends('layouts.standard')

@section('title-block')
Update message
@endsection

@section('content')
    <h1>Update record</h1>

<form action="{{ route('contact-update-submit', $data->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $data->name }}" class="form-control" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message"  class="form-control" placeholder="Enter your message">{{ $data->message }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection