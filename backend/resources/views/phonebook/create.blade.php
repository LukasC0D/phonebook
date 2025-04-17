@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div>
        <h2 class="mb-4 mt-4 text-light text-center">Add Contact</h2>
        <form action="{{ route('phonebook.store') }}" method="POST" class="d-flex flex-column">
            @csrf
            <input name="name" type="text" placeholder="Name" required class="p-2 mb-1 form-control">
            <input name="phone" type="text" placeholder="Phone" required class="p-2 mb-1 form-control">
            <input name="email" type="email" placeholder="Email (optional)" class="p-2 mb-1 form-control">
            <button class="text-white py-2 addBtn">Save</button>
        </form>
    </div>
</div>
@endsection
