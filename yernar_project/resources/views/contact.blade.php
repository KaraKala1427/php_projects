@extends('layouts.standard')

@section('title-block')
Contacts
@endsection

@section('content')
    <h1>Contact Page</h1>

<form action="{{ route('contact-form') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" placeholder="Enter your message"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection