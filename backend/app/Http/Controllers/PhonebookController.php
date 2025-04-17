<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phonebook;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PhonebookController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $myEntries = $user->phonebook;
        $sharedEntries = $user->sharedPhonebook;
        $allUsers = User::where('id', '!=', Auth::id())->get();

        return view('phonebook.index', compact('myEntries', 'sharedEntries', 'allUsers'));
    }

    public function create()
    {
        return view('phonebook.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
        ]);

        $data['user_id'] = Auth::id();

        Phonebook::create($data);

        return redirect()->route('phonebook.index')->with('success', 'Contact added!');
    }

    public function edit(Phonebook $phonebook)
    {
        return view('phonebook.edit', compact('phonebook'));
    }

    public function update(Request $request, Phonebook $phonebook)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',

        ]);

        $phonebook->update($data);

        return redirect()->route('phonebook.index')->with('success', 'Contact updated!');
    }

    public function destroy(Phonebook $phonebook)
    {
        $phonebook->delete();

        return redirect()->route('phonebook.index')->with('success', 'Contact deleted!');
    }

    public function share(Request $request, Phonebook $phonebook)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        if ($request->user_id == Auth::id()) {
            return back()->withErrors('You cannot share with yourself.');
        }

        $phonebook->sharedWith()->syncWithoutDetaching([$request->user_id]);

        return back()->with('success', 'Shared successfully!');
    }

    public function unshare(Request $request, Phonebook $phonebook)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $phonebook->sharedWith()->detach($request->user_id);

        return back()->with('success', 'Unshared successfully!');
    }
}
