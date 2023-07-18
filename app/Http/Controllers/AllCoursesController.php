<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Tutor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class AllCoursesController extends Controller
{

    public function showCourse($data){
            $fetchcategory=Courses::all()->unique('category');
        $fetchcourseTutors=Tutor::all()->take(6)->unique('email');
        $fetchcourseGraphics=Courses::inRandomOrder()->where('category','Graphics Design')->limit(3)->get();
        $fetchcourseWeb=Courses::inRandomOrder()->where('category','Web Development')->limit(3)->get()->unique('course_title');
        $fetchcourseCopywrite=Courses::inRandomOrder()->where('category','Copywriting')->limit(3)->get()->unique('course_title');
        $fetchcoursePublishing=Courses::inRandomOrder()->where('category','Desktop Publishing')->limit(3)->get()->unique('course_title');
        $fetchcourseDataAnalyst=Courses::inRandomOrder()->where('category','Data Analytics')->limit(3)->get()->unique('course_title');
        $fetchcourseProduct=Courses::inRandomOrder()->where('category','Product Management')->limit(3)->get()->unique('course_title');
        $fetchcourseMarketing=Courses::inRandomOrder()->where('category','Marketing')->limit(3)->get()->unique('course_title');
        $fetchcourseRealEstate=Courses::inRandomOrder()->where('category','Real Estate')->limit(3)->get()->unique('course_title');
        $fetchcourseUI=Courses::inRandomOrder()->where('category','UI/UX Design')->limit(3)->get()->unique('course_title');
        $fetchcoursePhotography=Courses::inRandomOrder()->where('category','Photography')->limit(3)->get()->unique('course_title');
       if(isset($data)){
        $usedataval=Crypt::decrypt($data);
        $query_db_for_data=Courses::all()->where('category',$usedataval)->unique('course_title');
        $fetch_all_category=Courses::all()->unique('course_title');
        return view('allcourses')->with(['user_category'=>$query_db_for_data, 'all_category'=>$fetch_all_category,"category"=>$fetchcategory, "graphics" => $fetchcourseGraphics,"web"=>$fetchcourseWeb, "copy"=>$fetchcourseCopywrite,"publishing"=>$fetchcoursePublishing,"data"=>$fetchcourseDataAnalyst,"product"=>$fetchcourseProduct,"marketing"=>$fetchcourseMarketing,"estate"=>$fetchcourseRealEstate,"ui"=>$fetchcourseUI,"photo"=>$fetchcoursePhotography,"tutor"=>$fetchcourseTutors]);
       }else{
        $fetch_all_category=Courses::all()->unique('course_title');
        return view('allcourses')->with(["all_category"=>$fetch_all_category,"category"=>$fetchcategory, "graphics" => $fetchcourseGraphics,"web"=>$fetchcourseWeb, "copy"=>$fetchcourseCopywrite,"publishing"=>$fetchcoursePublishing,"data"=>$fetchcourseDataAnalyst,"product"=>$fetchcourseProduct,"marketing"=>$fetchcourseMarketing,"estate"=>$fetchcourseRealEstate,"ui"=>$fetchcourseUI,"photo"=>$fetchcoursePhotography,"tutor"=>$fetchcourseTutors]);
       }
       

    }
     public function exploreCourse(){
                $fetchcategory=Courses::all()->unique('category');
        $fetchcourseTutors=Tutor::all()->take(20)->unique('email');
        $fetchcourseGraphics=Courses::inRandomOrder()->where('category','Graphics Design')->limit(3)->get();
        $fetchcourseWeb=Courses::inRandomOrder()->where('category','Web Development')->limit(3)->get()->unique('course_title');
        $fetchcourseCopywrite=Courses::inRandomOrder()->where('category','Copywriting')->limit(3)->get()->unique('course_title');
        $fetchcoursePublishing=Courses::inRandomOrder()->where('category','Desktop Publishing')->limit(3)->get()->unique('course_title');
        $fetchcourseDataAnalyst=Courses::inRandomOrder()->where('category','Data Analytics')->limit(3)->get()->unique('course_title');
        $fetchcourseProduct=Courses::inRandomOrder()->where('category','Product Management')->limit(3)->get()->unique('course_title');
        $fetchcourseMarketing=Courses::inRandomOrder()->where('category','Marketing')->limit(3)->get()->unique('course_title');
        $fetchcourseRealEstate=Courses::inRandomOrder()->where('category','Real Estate')->limit(3)->get()->unique('course_title');
        $fetchcourseUI=Courses::inRandomOrder()->where('category','UI/UX Design')->limit(3)->get()->unique('course_title');
        $fetchcoursePhotography=Courses::inRandomOrder()->where('category','Photography')->limit(3)->get()->unique('course_title');
        $fetch_all_category=Courses::all()->unique('course_title');
         return view('allcourses')->with(["all_category"=>$fetch_all_category,"category"=>$fetchcategory, "graphics" => $fetchcourseGraphics,"web"=>$fetchcourseWeb, "copy"=>$fetchcourseCopywrite,"publishing"=>$fetchcoursePublishing,"data"=>$fetchcourseDataAnalyst,"product"=>$fetchcourseProduct,"marketing"=>$fetchcourseMarketing,"estate"=>$fetchcourseRealEstate,"ui"=>$fetchcourseUI,"photo"=>$fetchcoursePhotography,"tutor"=>$fetchcourseTutors]);
     }
}
