@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div>
        <h2 class="text-center mb-4 mt-4 text-light">Edit</h2>
        <form action="{{ route('phonebook.update', $phonebook) }}" method="POST" class="d-flex flex-column">
            @csrf @method('PUT')
            <input name="name" value="{{ $phonebook->name }}" type="text" class="p-2 mb-1 form-control">
            <input name="phone" value="{{ $phonebook->phone }}" type="text" class="p-2 mb-1 form-control">
            <input name="email" value="{{ $phonebook->email }}" type="email" class="p-2 mb-1 form-control">
            <button class="text-white py-2 addBtn">Ok</button>
        </form>
    </div>
</div>
@endsection
