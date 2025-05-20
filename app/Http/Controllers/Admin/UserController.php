<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a list of all users
     */
    public function index()
    {
        // TODO: Get all users from database
        return view('admin.users.index');
    }

    /**
     * Show the form for editing user
     */
    public function edit($userId)
    {
        // TODO: Get user data from database
        return view('admin.users.edit');
    }

    /**
     * Update user information
     */
    public function update(Request $request, $userId)
    {
        // TODO: Validate and update user data
        return redirect()->route('admin.users.index')
            ->with('success', 'Naudotojo informacija sėkmingai atnaujinta');
    }

    /**
     * Show user details
     */
    public function show($userId)
    {
        // TODO: Get user details from database
        return view('admin.users.show');
    }
}
