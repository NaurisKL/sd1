<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a list of all conferences
     */
    public function index()
    {
        // TODO: Get all conferences from database
        return view('admin.conferences.index');
    }

    /**
     * Show the form for creating a new conference
     */
    public function create()
    {
        return view('admin.conferences.create');
    }

    /**
     * Store a newly created conference
     */
    public function store(Request $request)
    {
        // TODO: Validate and store conference data
        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija sėkmingai sukurta');
    }

    /**
     * Show the form for editing conference
     */
    public function edit($conferenceId)
    {
        // TODO: Get conference data from database
        return view('admin.conferences.edit');
    }

    /**
     * Update conference information
     */
    public function update(Request $request, $conferenceId)
    {
        // TODO: Validate and update conference data
        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencijos informacija sėkmingai atnaujinta');
    }

    /**
     * Remove the specified conference
     */
    public function destroy($conferenceId)
    {
        // TODO: Delete conference from database
        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija sėkmingai pašalinta');
    }
}
