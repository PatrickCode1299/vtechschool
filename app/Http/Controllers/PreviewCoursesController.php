<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\Studyuser;
use Illuminate\Support\Facades\Auth;
class PreviewCoursesController extends Controller
{
    public function index($data){
        $data=Crypt::decrypt($data);
        $to_store_data_value=array();
        foreach($data as $datakey => $datavalue){
           array_push($to_store_data_value,$datavalue);
        }
        $datavalue1=$to_store_data_value[0];
        $datavalue2=$to_store_data_value[1];
        $get_course_info=DB::table('courses')->where(['created_at'=>$datavalue1,'unique_id'=>$datavalue2])->first();
        $fetch_count_buyers=DB::table('payments')->where(['instructor_name'=>$get_course_info->unique_id, 'course_name'=>$get_course_info->course_title])->selectRaw('count(student_email) as students')->pluck('students');
        $indexvalue=$get_course_info->course_title;
        $indexvalue2=$get_course_info->unique_id;
        $get_course_module=DB::table('courses')->where(['course_title'=>$indexvalue,'unique_id'=>$indexvalue2])->get();
        $get_tutor_avatar=DB::table('tutors')->where(['email'=>$indexvalue2])->first();
          if(Auth::guard('web')->check()){
            $user_email=Auth::guard('web')->user()->email;
            $studycategory=$get_course_info->category;
            $studyInfo=array($studycategory,$user_email);
            $this->create($studyInfo);

        }
        return view('preview')->with(['about'=>$get_course_info, 'allmodules'=>$get_course_module, 'avatar'=>$get_tutor_avatar, 'buyers_count'=>$fetch_count_buyers]);
            

    }
    public function create(array $data)
    {
      return Studyuser::create([
        'category' => $data[0],
        'user_email' => $data[1]
      ]);
    }
}
