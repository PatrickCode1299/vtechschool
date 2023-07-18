<?php

namespace App\Http\Controllers;
use App\Models\Tutor;
use App\Models\Courses;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class InstructorPaymentController extends Controller
{
    public function index(){
        if (Auth::guard('admin')->check()) {
        $tutor_profile=Auth::guard('admin')->user()->email;
        $current_month=date('F, Y');
        $fetch_count_student=DB::table('payments')->where('instructor_name',$tutor_profile)->selectRaw('count(student_email) as students')->pluck('students');
        $fetch_count_courses_bought_in_current_month=DB::table('payments')->where(['instructor_name'=>$tutor_profile, 'payment_date'=>$current_month])->selectRaw('count(student_email) as students')->pluck('students');
        $fetch_tutor_courses=DB::table('payments')->where('instructor_name',$tutor_profile)->get();
        $all_tutor_course_amount=array();
        foreach ($fetch_tutor_courses as $course) {
              array_push($all_tutor_course_amount,$course->payment_amount);
         }
        $total_amount=array_sum($all_tutor_course_amount);
       $sum_tutor_revenue=$total_amount * 0.3;
       $all_tutor_revenue=number_format($sum_tutor_revenue);

       $fetch_monthly_course=DB::table('payments')->where(['instructor_name'=>$tutor_profile, 'payment_date'=>$current_month])->get();
        $current_month_amount=array();
        foreach ($fetch_monthly_course as $course) {
              array_push($current_month_amount,$course->payment_amount);
         }
        $current_month_total_amount=array_sum($current_month_amount);
       $sum_curr_month_revenue=$current_month_total_amount * 0.3;
       $current_month_revenue=number_format($sum_curr_month_revenue);
        return view('auth.instructor_payment')->with(['student_count'=>$fetch_count_student,'monthly_student_count'=>$fetch_count_courses_bought_in_current_month, 'tutor_revenue'=>$all_tutor_revenue,'current_month_revenue'=>$current_month_revenue]);


        }else{
            return view('auth.admin_login');

       
        }
    }
}
