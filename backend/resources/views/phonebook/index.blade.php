@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <h2 class="text-light mb-5">📇 My Contacts</h2>
        <div class="ml-3 mt-2">
            <a href="{{ route('phonebook.create') }}" class="btn btn-outline-light px-2 py-0">Add +</a>
        </div>
    </div>

    @if (count($myEntries ?? []) > 0)
        <div class="container">
            <table class="table table-bordered table-dark text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>📞 Phone</th>
                        <th>📧 Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myEntries as $entry)
                        <tr>
                            <td class="pt-3">{{ $entry->name }}</td>
                            <td class="pt-3">{{ $entry->phone }}</td>
                            <td class="pt-3">{{ $entry->email }}</td>
                            <td>
                                <a href="{{ route('phonebook.edit', $entry) }}"class="btn btn-outline-warning py-0">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('phonebook.destroy', $entry) }}" method="POST"
                                    onsubmit="return confirm('Delete this contact?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <div class="d-flex justify-content-start flex-wrap">
                                    <form action="{{ route('phonebook.share', $entry) }}" method="POST"
                                        class="d-flex gap-2 align-items-center">
                                        @csrf
                                        <select name="user_id" class="form-control form-control-sm bg-dark text-light text-center"
                                        required>
                                            <option value="" disabled selected>Select user to share with</option>
                                            @foreach ($allUsers as $user)
                                                @if (!$entry->sharedWith->contains($user->id))
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button class="btn btn btn-outline-success btn-sm ml-1 mr-2">Share</button>
                                    </form>

                                    @foreach ($entry->sharedWith as $user)
                                        <form action="{{ route('phonebook.unshare', $entry) }}" method="POST"
                                            class="d-flex align-items-center">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <button class="btn btn-outline-secondary btn-sm py-0 px-1 mr-1">
                                                {{ $user->name ?? 'User' . $user->id }} ❌
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </td>
                    @endforeach
                </tbody>
            </table>
            <div class="btn d-flex justify-content-end">
                <a href="{{ route('phonebook.create') }}" class="btn">Add Contact</a>
            </div>
        </div>
    @else
        <div class="text-center text-light">
            <p>No contacts found !</p>
            <div class="mt-2">
                <a href="{{ route('phonebook.create') }}" class="btn text-light">Add Contact</a>
            </div>
        </div>
    @endif

    @if (count($sharedEntries ?? []) > 0)
        <div class="container mt-5">
            <h3 class="text-light mb-5 text-center">📤 Contacts Shared With Me</h3>
            <table class="table table-bordered table-secondary text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>📞 Phone</th>
                        <th>📧 Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sharedEntries as $sharedEntry)
                        <tr>
                            <td>{{ $sharedEntry->name }}</td>
                            <td>{{ $sharedEntry->phone }}</td>
                            <td>{{ $sharedEntry->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
