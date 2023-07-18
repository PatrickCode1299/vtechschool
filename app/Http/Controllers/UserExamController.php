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
     $fetch_user_exam_questions=DB::select("SELECT * FROM examquestions WHERE tutor_email='$tutor_email' AND course_title='$course_title' ORDER BY RAND()");
       if($fetch_user_exam_questions){
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
        $user_answer=$request->all();
        $fetch_answer_to_compare=DB::table('examquestions')->where(['course_title'=>$course])->get();
        $user_score=0;
        $new_answer=array_splice($user_answer, 3);
        $broken_answers_array=array();
        foreach($new_answer as $key => $value){
                array_push($broken_answers_array,$value);
        }
        $main_answer_array=array();
        foreach($fetch_answer_to_compare as $answer){
           $tutor_answers=array($answer->answer4);

           $compare=array_diff($tutor_answers,$broken_answers_array);
           foreach($compare as $key => $value){
                array_push($main_answer_array,$value);
           }

          
        }
         if(empty($main_answer_array)){
            $user_score=20;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 1){
            $user_score=19;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 2){
            $user_score=18;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 3){
            $user_score=17;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 4){
            $user_score=16;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 5){
            $user_score=15;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 6){
            $user_score=14;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 7){
            $user_score=13;
            $final_score=($user_score * 100)/20;
          }elseif(sizeof($main_answer_array) == 8){
            $user_score=12;
            $final_score=($user_score * 100)/20;
          }else{
            $user_score=0;
            $final_score=($user_score * 100)/20;
          }
      if($final_score < 0){
          $newscore=0;
          $final_score=$newscore;
          return view('auth.exam_result')->with(['final_score'=>$final_score, 'user_course'=>$course,'tutor_details'=>$tutor_details]);  
        }else{
            return view('auth.exam_result')->with(['final_score'=>$final_score, 'user_course'=>$course,'tutor_details'=>$tutor_details]);
        }
        


         
        

    }
}
 
