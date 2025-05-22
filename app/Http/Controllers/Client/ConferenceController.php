<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\ConferenceRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest()->paginate(10);
        return view('client.conferences.index', compact('conferences'));
    }

    public function show(Conference $conference)
    {
        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = $conference->registeredUsers()
                ->where('user_id', Auth::id())
                ->exists();
        }
        return view('client.conferences.show', compact('conference', 'isRegistered'));
    }

    public function register(Conference $conference)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to register for conferences.');
        }

        // Check if user is already registered
        if ($conference->registeredUsers()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        // Check if conference is at capacity
        if ($conference->capacity && $conference->registrations()->count() >= $conference->capacity) {
            return redirect()->back()->with('error', 'Sorry, this conference is at full capacity.');
        }

        // Create registration
        $conference->registeredUsers()->attach(Auth::id(), ['status' => 'pending']);

        return redirect()->back()->with('success', 'Successfully registered for the conference.');
    }

    public function unregister(Conference $conference)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $conference->registeredUsers()->detach(Auth::id());

        return redirect()->back()->with('success', 'Successfully unregistered from the conference.');
    }
} 