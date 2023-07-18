<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
       // $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        
       
        $this->create();
        return redirect()->route("dashboard");
    }
    
    public function create()
    {
    session_start();
    $data =array('student_name' =>$_SESSION['student_name'], 'student_email' =>$_SESSION['student_email'],'student_course' => $_SESSION['course_title'],'student_course_price'=>$_SESSION['course_price'], 'tutor_email'=>$_SESSION['tutors_email']);
    $month=date('F, Y');
      return Payment::create([
        'student_name' => $data['student_name'],
        'student_email' => $data['student_email'],
        'course_name' => $data['student_course'],
        'payment_amount' => $data['student_course_price'],
        'instructor_name' =>$data['tutor_email'],
        'payment_date' => $month,
        'status' => 1
      ]);
      session_unset();
      session_destroy();
     
    } 

   
}
