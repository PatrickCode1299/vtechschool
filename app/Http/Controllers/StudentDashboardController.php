<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class StudentDashboardController extends Controller
{
    public function index(){
        if (Auth::guard('web')->check()) {
            $fetchuser=Auth::guard('web')->user()->email;
            $getuserinfo=DB::table('users')->where('email',$fetchuser)->first();
            $getpaidcourse=Payment::all()->where('student_email',$fetchuser)->unique('course_name');
            if($getpaidcourse){
                 foreach($getpaidcourse as $course_info){
                    $course_name=$course_info->course_name;
                    $course_email=$course_info->instructor_name;
                    if(empty($course_email) && empty($course_name)){   
                        $fetch_distinct_course=null;
                     }else{
                        $fetch_distinct_course=Courses::all()->where('unique_id','!=',$course_email)->unique('course_title');
                        return view('auth.student_dashboard')->with(["user_course"=>$getpaidcourse,'new_course'=>$fetch_distinct_course]);
                     }


                    
                 }
                 
           
          
            }  
            return view('auth.student_dashboard')->with(["user_course"=>'','new_course'=>'']);

        }else{
            return view('auth.login');

       
        }
        
    }
}
