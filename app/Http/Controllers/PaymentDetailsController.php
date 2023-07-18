<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PaymentDetailsController extends Controller
{
    public function index(){
        if(Auth::guard('web')->check()){
            $user=Auth::user()->email;
        $fetch_paid_details=Payment::all()->where('student_email',$user)->unique();
        if($fetch_paid_details->count() > 0){
             return view('payment_details')->with('payment_info', $fetch_paid_details);
         }else{
            return view('payment_details')->with('payment_info','');
         }
       
        }else{
          return view('login');  
        }




    }
}
