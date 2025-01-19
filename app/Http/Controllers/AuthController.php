<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request): RedirectResponse
    {
        // Attempt to authenticate the user
        if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended(route('admin.dashboard-page', absolute: false));
        }

        // Authentication failed
        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login-page');
    }
}
