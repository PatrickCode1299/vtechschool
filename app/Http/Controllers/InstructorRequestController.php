<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorRequestController extends Controller
{
    public function index(){
        return view('instructor_register');
    }
}
