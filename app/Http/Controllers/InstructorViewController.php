<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class InstructorViewController extends Controller
{
    public function index($data){
        $instructor_name=Crypt::decrypt($data);
       $tutor_profile=$instructor_name['id'];
       $fetch_tutor_profile=DB::table('tutors')->where('email',$tutor_profile)->first();
       $fetch_instructor_course=DB::table('courses')->where('unique_id',$tutor_profile)->get()->unique('course_title');
       $fetch_count_student=DB::table('payments')->where('instructor_name',$tutor_profile)->selectRaw('count(student_email) as students')->pluck('students');

       return view('instructor_view')->with(['tutor_info'=>$fetch_tutor_profile,'tutor_course'=>$fetch_instructor_course,'student_count'=>$fetch_count_student]);
    }
}
