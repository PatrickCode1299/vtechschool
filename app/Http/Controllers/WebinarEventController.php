<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebinarEventController extends Controller
{
    public function index(){
        return view('webinar');
    }
}
