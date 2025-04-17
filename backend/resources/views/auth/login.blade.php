@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center center">
    <div class="bg-dark p-4 rounded" style="width: 300px;">
        <h2 class="text-light text-center mb-4">Login</h2>
        <form method="POST" action="/login" class="d-flex flex-column align-items-center">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="form-control mb-3 text-center">
            <input type="password" name="password" placeholder="Password" required class="form-control mb-3 text-center">
            <button class="btn btn-primary m-1" type="submit">Log In</button>
        </form>
    </div>
</div>
@endsection
