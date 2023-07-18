<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class EduinfoController extends Controller
{
    public function index(Request $request){
    if(is_numeric($request->input('school')) || is_numeric($request->input('qualification'))){
    echo "<script>alert('You entered a numeric value, your edu info cannot contain numeric values');</script>";
    return redirect()->route("admin_dashboard");

    }else{
        $school=$request->input('school');
        $email=$request->input('email');
        $qualification=$request->input('qualification');
        DB::table('tutors')->where('email',$email)->update(array('school'=>$school,'qualification'=>$qualification));
        echo "<script>
        alert('Education Records Updated');
        </script>";
        return redirect()->route("admin_dashboard");
    }
    }
    public function createProfilePic(Request $request){
              $validatedData = $request->validate([
            'tutors_name' => '', 
            'unique_id' => '',
            'about' => 'required',
            'file' => 'required',

        'file.*' => 'mimes:jpeg,jpg,png,JPG,JPEG,PNG'
        ]);
 
     
             
                    $file = $request->file('file');
                    $about= $request->input('about');
                    $filename=time().'_'.$file->getClientOriginalName();
                    $filesize=$file->getSize();
                    DB::table('tutors')->where('email',$request->unique_id)->update(array('avatar'=>$filename,'about'=>$about));
                    Storage::disk('avatar')->put($filename, file_get_contents($file));
                    return redirect()->route("admin_dashboard");
            
}
}