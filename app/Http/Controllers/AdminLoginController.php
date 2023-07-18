<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 

class AdminLoginController extends Controller
{
   public function customLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
     
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin_dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
