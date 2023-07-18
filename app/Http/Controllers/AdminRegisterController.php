<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Tutor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
     public function index()
    {
        return view('auth.admin_registration');
    }
      
     public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'location' => 'required',
            'password' => 'required|min:8',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route("admin_dashboard");
    }

    public function create(array $data)
    {
      return Tutor::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'location' =>$data['location'],
        'password' => Hash::make($data['password'])
      ]);
    }    
}
