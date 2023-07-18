<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use App\Models\Courses;
use App\Models\Examquestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
   public function index(){
         if (Auth::guard('admin')->check()) {
            $fetchuser=Auth::guard('admin')->user()->email;
            $getuserinfo=DB::table('tutors')->where('school',null)->first();
            $users=DB::table('tutors')->where('email',$fetchuser)->first();
            return view('auth.admin_dashboard')->with(["users"=>$users]);


        }else{
            return view('auth.admin_login');

       
        }
          
   }
   public function examine(){
      
      $tutor_email=Auth::guard('admin')->user()->email;
      $users=DB::table('tutors')->where('email',$tutor_email)->first();
      $fetch_all_tutor_course=Courses::all()->where('unique_id',$tutor_email)->unique('course_title');
      $fetch_tutor_questions=DB::table('examquestions')->where('tutor_email',$tutor_email)->get();
      
         return view('auth.exam_set')->with(['tutor_course'=>$fetch_all_tutor_course, 'users'=>$users, 'tutor_question'=>$fetch_tutor_questions]);
      
      
      
   }
   public function setQuestion(Request $request){

       $request->validate([
            'course_title' => '',
            'tutor_email'  => '',
            'question_id' => '',
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',

        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        return redirect('exam');
   }
    public function create(array $data)
    {
      return Examquestions::create([
         'course_title' => $data['course_title'],
         'tutor_email' => $data['tutor_email'],
         'question_id' => $data['question_id'],
        'question' => $data['question'],
        'answer1' => $data['answer1'],
        'answer2' => $data['answer2'],
        'answer3' => $data['answer3'],
        'answer4' => $data['answer4'],
      ]);
    }  
}
