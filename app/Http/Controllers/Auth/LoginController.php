<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            // Check if the user has the desired role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/');
            } elseif ($user->role === 'user') {
                return redirect()->intended('/admin/');
            } else {
                // Handle other roles as needed
                Auth::logout(); // Log out if the user has an unknown role
                return back()->withInput()->withErrors(['email' => 'Invalid login credentials']);
            }
        }   // Authentication failed
        return back()->withInput()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
