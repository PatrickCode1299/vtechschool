<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;
use App\Models\Examquestions;

class UserExamController extends Controller
{
    public function index($data){
    if (Auth::guard('web')->check()) {
    $data=Crypt::decrypt($data);
     $tutor_email=$data['tutor_email'];
     $course_title=$data['course_title'];
       $fetch_user_exam_questions=DB::table('examquestions')->where(['tutor_email'=>$tutor_email, 'course_title'=>$course_title])->get();
       if($fetch_user_exam_questions->count() > 0){
         return view('auth.user_exam')->with(['exam_questions'=>$fetch_user_exam_questions, 'tutor_email'=>$tutor_email, 'course_title'=>$course_title]);

     }else{
        return view('auth.user_exam')->with(['exam_info'=>'Exam not Set', 'tutor_email'=>$tutor_email, 'course_title'=>$course_title]);
     }
       
    }else{
       return view('auth.login');
    }
    }
    public function markExam(Request $request){
        $tutor=$request->tutor;
        $tutor_details=DB::table('tutors')->where('email',$tutor)->first();
        $course=$request->course;
        $user_answer=array($request->user_answers);
        $answer=$request->user_answers;
       $fetch_answer_to_compare=DB::table('examquestions')->where(['course_title'=>$course])->get();
        
        $user_score=0;
         $keep_tutor_answer=array();
        foreach($fetch_answer_to_compare as $answer){
           $tutor_answers=$answer->answer4;
           array_push($keep_tutor_answer,$tutor_answers);
           /**
           if($user_answer===$tutor_answers){
            //$user_score=$user_score+1;
            echo "Yes \n";

           }else{
            //$user_score=$user_score -1;
            //echo "No";
           }
           **/
           
        } 
        $result=array_diff($user_answer, $keep_tutor_answer);
        $missed_answers= count($result);
        $x=20;
        $x=$x-$missed_answers;
        echo $x;
    
      
        



        /**
        $final_score=($user_score * 100)/20;
        if($final_score < 0){
          $newscore=0;
          $final_score=$newscore;
          return view('auth.exam_result')->with(['final_score'=>$final_score, 'user_course'=>$course,'tutor_details'=>$tutor_details]);  
        }else{
            return view('auth.exam_result')->with(['final_score'=>$final_score, 'user_course'=>$course,'tutor_details'=>$tutor_details]);
        }

         **/
        

    }
}
 
