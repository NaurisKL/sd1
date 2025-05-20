<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a list of all conferences
     */
    public function index()
    {
        // TODO: Get all conferences from database
        return view('employee');
    }

    /**
     * Show conference details and participants
     */
    public function show($conferenceId)
    {
        // TODO: Get conference details and participants from database
        return view('employee.conference-details');
    }

    /**
     * Show list of participants for a conference
     */
    public function participants($conferenceId)
    {
        // TODO: Get participants list from database
        return view('employee.participants');
    }
}
