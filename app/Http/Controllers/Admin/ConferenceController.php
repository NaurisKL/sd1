<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest()->paginate(10);
        return view('admin.conferences.index', compact('conferences'));
    }

   
     //Show the form for creating a new conference
     
    public function create()
    {
        return view('admin.conferences.create');
    }

    /**
     * Store a newly created conference
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
        ]);

        Conference::create($request->all());

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference created successfully.');
    }

    /**
     * Show the form for editing conference
     */
    public function edit(Conference $conference)
    {
        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * Update conference information
     */
    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
        ]);

        $conference->update($request->all());

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference updated successfully.');
    }

    /**
     * Remove the specified conference
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Conference deleted successfully.');
    }
}
