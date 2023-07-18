<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.admin_login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin_dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("admin_login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.admin_registration');
    }
    public function registrationUser()
    {
        return view('auth.register');
    } 

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin_login');
    }
}
