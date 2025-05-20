<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a list of upcoming conferences
     */
    public function index()
    {
        // TODO: Get upcoming conferences from database
        return view('client');
    }

    /**
     * Register for a conference
     */
    public function register($conferenceId)
    {
        // TODO: Add registration logic
        return redirect()->back()->with('success', 'Sėkmingai užsiregistravote į konferenciją');
    }

    /**
     * Show conference details
     */
    public function show($conferenceId)
    {
        // TODO: Get conference details from database
        return view('client.conference-details');
    }
}
