<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use App\Models\Coursedetail;
use App\Models\ModuleDetails;
class ViewCourseController extends Controller
{
    public function index($data){
         if(Auth::guard('web')->check()) {
        $data=Crypt::decrypt($data);
        $start_date=date('l jS  F Y');
        $to_store_data_value=array();
        foreach($data as $datakey => $datavalue){
           array_push($to_store_data_value,$datavalue);
        }
        $datavalue1=$to_store_data_value[0];
        $datavalue2=$to_store_data_value[1];
        $loggedinUser=Auth::user()->email;
        $updateCourseDetails=array($start_date,$datavalue1,$loggedinUser,$datavalue2,1);
        $fetch_course_details=DB::table('coursedetails')->where(['owner_email'=>$loggedinUser,'course_title'=>$datavalue1])->first();
        if($fetch_course_details){
          $newview= $fetch_course_details->views+1 ?? '0';
          DB::table('coursedetails')->where(['owner_email'=>$loggedinUser,'course_title'=>$datavalue1])->update(array('views'=>$newview));
        $tutor_email=$fetch_course_details->tutor_email;
        $course_title=$fetch_course_details->course_title;
        $fetch_course_exam=DB::table('examquestions')->where(['tutor_email'=>$tutor_email,'course_title'=>$course_title])->get();
          if(isset($fetch_course_details->views)){
            $get_course_user_view=$newview;
        }else{
            $get_course_user_view=0;
        }
           $getvideos=DB::table('courses')->where(['unique_id'=>$datavalue2,'course_title'=>$datavalue1])->first();
    $get_all_modules=DB::table('courses')->where(['unique_id'=>$datavalue2,'course_title'=>$datavalue1])->get();
    
    $get_tutor_info=DB::table('tutors')->where('email',$datavalue2)->first();
    $get_course_user_view=$newview;

        return view('auth.view')->with(['video_details'=>$getvideos, 'module'=>$get_all_modules, 'tutor_info'=>$get_tutor_info,'course_views'=>$get_course_user_view,'course_exam'=>$fetch_course_exam]); 
        }else{
            $this->create($updateCourseDetails);
            $fetch_course_details=DB::table('coursedetails')->where(['owner_email'=>$loggedinUser,'course_title'=>$datavalue1])->first();
             $newview= $fetch_course_details->views+1 ?? '0';
          DB::table('coursedetails')->where(['owner_email'=>$loggedinUser,'course_title'=>$datavalue1])->update(array('views'=>$newview));
        $tutor_email=$fetch_course_details->tutor_email;
        $course_title=$fetch_course_details->course_title;
        $fetch_course_exam=DB::table('examquestions')->where(['tutor_email'=>$tutor_email,'course_title'=>$course_title])->get();
          if(isset($fetch_course_details->views)){
            $get_course_user_view=$newview;
        }else{
            $get_course_user_view=0;
        }
           $getvideos=DB::table('courses')->where(['unique_id'=>$datavalue2,'course_title'=>$datavalue1])->first();
    $get_all_modules=DB::table('courses')->where(['unique_id'=>$datavalue2,'course_title'=>$datavalue1])->get();
    
    $get_tutor_info=DB::table('tutors')->where('email',$datavalue2)->first();
    $get_course_user_view=$newview;

            return view('auth.view')->with(['video_details'=>$getvideos, 'module'=>$get_all_modules, 'tutor_info'=>$get_tutor_info,'course_views'=>$get_course_user_view,'course_exam'=>$fetch_course_exam]); 
        }




       
    }else{
        return redirect()->route('login');
    }
}
public function answerTrivia(Request $request){
    $data=$request->all();
    dd($data);
}
 public function create(array $data)
    {
      return Coursedetail::create([
        'user_start_date' => $data[0],
        'course_title' => $data[1],
        'owner_email' => $data[2],
        'tutor_email' =>$data[3],
        'views' => $data[4]
      ]);
    }  
}

