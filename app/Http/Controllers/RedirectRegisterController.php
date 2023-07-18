<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class RedirectRegisterController extends Controller
{
    public function registrationRedirect($info){
        $data=Crypt::decrypt($info);
        $to_store_data_value=array();
         foreach($data as $datakey => $datavalue){
           array_push($to_store_data_value,$datavalue);
        }
        $datavalue1=$to_store_data_value[0];
        $datavalue2=$to_store_data_value[1];
        return view('auth.register')->with(['redirectid'=>$datavalue1,'redirectmail'=>$datavalue2]);
    }
}
