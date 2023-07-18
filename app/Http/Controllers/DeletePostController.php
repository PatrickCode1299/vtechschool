<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Courses;
use Response;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DeletePostController extends Controller
{
        public function deletePost(Request $request){
        $delete_video_file=$request->video;
        $delete_picture_file=$request->picture;
        $delete_record_id=$request->id;
        $content = Courses::find($delete_record_id);
        $content->delete();
        File::delete(public_path('storage/uploads/'.$delete_video_file));
        File::delete(public_path('storage/preview/'.$delete_picture_file));
      
        return redirect()->route('main_dashboard');
    }
}
