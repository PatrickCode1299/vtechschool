<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SearchCoursesController extends Controller
{
  public function index(Request $request){
    $request->validate([
            'course' => 'required',
            
        ]);
    $data=$request->all();
    $data_to_find=$data['course'];
    $find_course_in_db=DB::select("SELECT * from courses WHERE course_title LIKE '%$data_to_find%' AND module_title ='introduction' ORDER BY id DESC");
    if($find_course_in_db){
   foreach ($find_course_in_db as $course_name) {
    return view('find_course')->with(["courses_detail"=>$find_course_in_db]);
   }
       }else{
        echo "<h2>We couldn't find what you were looking for.</h2>";
       }
    
  }
}
