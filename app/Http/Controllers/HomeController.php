<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Payment;
use App\Models\Courses;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user()->email;
        $user_redirect1=Auth::user()->redirect1;
        $user_redirect2=Auth::user()->redirect2;
        $datavalue1=$user_redirect1;
        $datavalue2=$user_redirect2;
        $fetchredirectuser=DB::table('courses')->where(['created_at'=>$datavalue1,'unique_id'=>$datavalue2])->first();
        if($fetchredirectuser){
        $indexvalue=$fetchredirectuser->course_title;
        $indexvalue2=$fetchredirectuser->unique_id;
        $valid_payment_course=$fetchredirectuser->course_title;
        $fetch_count_buyers=DB::table('payments')->where(['instructor_name'=>$fetchredirectuser->unique_id, 'course_name'=>$fetchredirectuser->course_title])->selectRaw('count(student_email) as students')->pluck('students');
        $check_if_user_paid=Payment::all()->where('student_email',$user);
        if($check_if_user_paid){
        foreach($check_if_user_paid as $get_paid){
        if(!empty($get_paid)){
            $course_paid_for=null;
        $course_instructor=null;
        return view('home')->with('loggedinuser',$user);
        }else{
        $course_paid_for=$get_paid->course_name;
        $course_instructor=$get_paid->instructor_email;
        $check_table_user_courses=Courses::all()->where(['course_title'=>$course_paid_for, 'unique_id'=> $course_instructor])->unique('course_title');
         return view('home')->with('user_course',$check_table_user_courses);
        }
        
        }
        $get_course_module=DB::table('courses')->where(['course_title'=>$indexvalue,'unique_id'=>$indexvalue2])->get();
        return view('preview')->with(['about'=>$fetchredirectuser, 'allmodules'=>$get_course_module,'buyers_count'=>$fetch_count_buyers]);
        }else{
        $get_course_module=DB::table('courses')->where(['course_title'=>$indexvalue,'unique_id'=>$indexvalue2])->get();

        return view('preview')->with(['about'=>$fetchredirectuser, 'allmodules'=>$get_course_module, 'buyers_count'=>$fetch_count_buyers]);
           } 
        }else{
            return view('home')->with('loggedinuser',$user);
        }
    }
    
}
