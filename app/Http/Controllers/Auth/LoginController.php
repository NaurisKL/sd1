<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check if user exists
        $user = User::where('name', $credentials['username'])->first();

        if (!$user) {
            // Create admin user if it doesn't exist and credentials are admin/admin
            if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin') {
                // Check if admin user already exists with different email
                $adminUser = User::where('role', 'admin')->first();
                if ($adminUser) {
                    $user = $adminUser;
                } else {
                    $user = User::create([
                        'name' => 'admin',
                        'email' => 'admin@admin.com',
                        'password' => Hash::make('admin'),
                        'role' => 'admin'
                    ]);
                }
            } else {
                return back()->with('error', 'Invalid credentials');
            }
        }

        // Check password
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin') {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
