<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest()->paginate(10);
        return view('employee.conferences.index', compact('conferences'));
    }

    public function show(Conference $conference)
    {
        return view('employee.conferences.show', compact('conference'));
    }
} 