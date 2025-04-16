@extends('layouts.master')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="text-light" style="">Welcome {{ Auth::user()->name ?? null}}</h1>
    </div>
@endsection

