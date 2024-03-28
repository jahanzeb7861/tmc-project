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

        $menuItems = [
            [
                'label' => 'About Mominabad',
                'url' => '/about',
                'subItems' => [
                    ['label' => 'About Us', 'url' => '/about'],
                    ['label' => 'Chairman Message', 'url' => '/message'],
                    ['label' => 'Vision and Mission Statement', 'url' => '/message'],
                    ['label' => 'View Map', 'url' => '/admin/map/view'],
                    ['label' => 'Union Councils List', 'url' => '/message'],
                    ['label' => 'Staff', 'url' => '/message'],
                    ['label' => 'Functions', 'url' => '/page/functions'],
                ]
            ],
            [
                'label' => 'Services',
                'url' => '/services',
                'subItems' => [
                    ['label' => 'Schools', 'url' => '/schools'],
                    ['label' => 'Dispensaries / Maternity Homes', 'url' => '/details/dispensaries-maternity-homes'],
                    ['label' => 'Community Centers', 'url' => '/details/list-of-community-center-in-tmc-mominabad'],
                    ['label' => 'Libraries', 'url' => '/details/library'],
                    ['label' => 'Apply for Trade License', 'url' => '/trade'],
                ]
            ],
            [
                'label' => 'News & Media',
                'url' => '/',
                'subItems' => [
                    ['label' => 'Press Release', 'url' => '/publication'],
                    ['label' => 'Events', 'url' => '/events'],
                    ['label' => 'Video Gallery', 'url' => '/vgallery'],
                    ['label' => 'Procurement', 'url' => '/'],
                ]
            ],
            [
                'label' => 'Contact Us',
                'url' => '/contact',
                'subItems' => [
                    ['label' => 'Complaint # 1339', 'url' => 'https://1339.gos.pk/'],
                ]
            ],
        ];

        return view('auth.login', compact('menuItems'));
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
