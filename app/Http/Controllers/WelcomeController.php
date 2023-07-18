<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function showWelcome(){
        $allcourses=Courses::orderBy('course_title','desc')->get()->unique('course_title');
        $fetchcategory=Courses::orderBy('course_title','desc')->get()->unique('category');
        return view('welcome')->with(["courses"=>$allcourses, "category"=>$fetchcategory]);
    }
}
