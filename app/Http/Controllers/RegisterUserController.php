<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
      
     public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'location' => 'required',
            'password' => 'required|min:8',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route("home");
    }

    public function create(array $data)
    {
      $user=User::create([
        'name' => $data['name'],
        'username' => 'required',
        'email' => $data['email'],
        'location' =>$data['location'],
        'password' => Hash::make($data['password'])
      ]);
      $user->notify(new WelcomeEmailNotfication());
      return $user;
    }  
}
