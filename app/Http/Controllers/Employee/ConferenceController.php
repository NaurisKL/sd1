<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::withCount('registrations')->latest()->paginate(10);
        return view('employee.conferences.index', compact('conferences'));
    }

    public function show(Conference $conference)
    {
        $conference->load('registeredUsers');
        return view('employee.conferences.show', compact('conference'));
    }

    public function updateRegistration(Request $request, Conference $conference, User $user)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $conference->registeredUsers()->updateExistingPivot($user->id, [
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Registration status updated successfully.');
    }
} 