@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="bg-dark p-4 rounded" style="width: 300px;">
            <div class="text-center text-light mb-4">
                <h2>Register</h2>
            </div>
            <form method="POST" action="/register" class="d-flex flex-column align-items-center">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required class="form-control mb-3 text-center">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="form-control mb-3 text-center">
                <input type="password" name="password" placeholder="Password" required class="form-control mb-3 text-center">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="form-control mb-3 text-center">
                <button class="btn btn-primary m-1" type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
