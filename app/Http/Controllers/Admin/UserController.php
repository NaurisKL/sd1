<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a list of all users
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')
                ],
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,employee,client'
            ]);

            User::create($validated);

            return redirect()->route('admin.users.index')
                ->with('success', 'User created successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                return back()
                    ->withInput()
                    ->withErrors(['email' => 'This email address is already in use.']);
            }
            throw $e;
        }
    }

    /**
     * Show the form for editing user
     */
    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user information
     */
    public function update(Request $request, $userId)
    {
        try {
            $user = User::findOrFail($userId);
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($userId)
                ],
                'role' => 'required|in:admin,employee,client'
            ]);

            $user->update($validated);

            return redirect()->route('admin.users.index')
                ->with('success', 'User information updated successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                return back()
                    ->withInput()
                    ->withErrors(['email' => 'This email address is already in use.']);
            }
            throw $e;
        }
    }

    /**
     * Show user details
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Delete a user
     */
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        
        // Prevent deleting the last admin
        if ($user->role === 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return redirect()->route('admin.users.index')
                    ->with('error', 'Cannot delete the last admin user.');
            }
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
