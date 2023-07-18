<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutAdminController extends Controller
{
    public function index(){
        Session::flush();
        Auth::logout();
        return redirect('admin_login');
    }
}
