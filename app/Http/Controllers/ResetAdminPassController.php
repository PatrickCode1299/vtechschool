<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class ResetAdminPassController extends Controller
{
    public function index(Request $request){
        $pass=$request->password;
        $email=$request->email;
        $find_tutor=DB::table('tutors')->where('email',$email)->first();
        if($find_tutor){
            $new_pass=$pass;
            $db_pass=password_hash($new_pass, PASSWORD_DEFAULT);
            $current_date=date('Y-m-d H:i:s');
            DB::table('tutors')->where('email',$email)->update(['password'=>$db_pass,'updated_at'=>$current_date]);
            $find_updated_pass=DB::table('tutors')->where('email',$email)->first();
            //echo "<script>alert('Password update Successful');</script>";
            return redirect()->route("admin_login");
        }else{
            return redirect()->route("home");
        }
        
    }
    public function showPage(){
        return view('reset_tutors');
    }
}
