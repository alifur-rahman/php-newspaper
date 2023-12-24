<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user_table_model;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;
use App\Mail\OTP_sender;

class user_controller extends Controller
{
    function sendRegData(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $created_at = date("Y-m-d h:i:s");
        // YYYY-MM-DD HH:MM:SS
        $full_name = $req->full_name;
        $email = $req->email;
        $password = $req->password;
        $userData = json_decode(user_table_model::select('id')->where('email', '=', $email)->get());
        $Ucount = count($userData);
        if($Ucount == 0){
            $code = rand(100000, 999999);
            $result= DB::table('users')->insert([
                'name'=>$full_name,
                'email'=>$email,
                'password'=>$password,
                'remember_token'=>$code,
                'created_at'=>$created_at
            ]);
            if($result == true){
                $mtitle = "Registration OTP";
                $mShortMsg = "Use this OTP code to confrim you registration";
                Mail::to($email)->send(new OTP_sender($mtitle,$mShortMsg,$code));
                return response()->json(['data' => 'success']);
                


                // Mail::to($email)->send(new welcomeMail());


            }else{
                return response()->json(['data' => 'fail']);
            }
        }
        else{
            return response()->json(['data' => 'duplicate']);
        }

    }

    function sendLoginData(Request $req){
        $password = $req->password;
        $email = $req->email;
        $userData = json_decode(user_table_model::select('id','password','email_verified_at')->where('email', '=', $email)->get());
        $Ucount = count($userData);
        if($Ucount == 1){
            foreach($userData as $key){
                $id = $key->id;
                $dbPass = $key->password;
                $email_verified_at = $key->email_verified_at;
            }
            if($dbPass == $password){
                if($email_verified_at != null){
                    $req->session()->put('outerUserID', $id);
                    return response()->json(['data' => 'success']);
                }
                else{
                    $code = rand(100000, 999999);
                    $mtitle = "Login Page OTP SENDER";
                    $mShortMsg = "Use this OTP for instent login";
                    $result = user_table_model::where('id',$id)->update([
                        'remember_token' => $code
                    ]);
                    if($result == true){
                        Mail::to($email)->send(new OTP_sender($mtitle,$mShortMsg,$code));
                        return response()->json(['data' => 'Not Verified']);
                    }
                    else{
                        return response()->json(['data' => 'Main Send Faild']);
                    }
                }
            }
            else{
                return response()->json(['data' => 'error']);
            }
            
        }
        else{
            return response()->json(['data' => 'error']);
        }

      
    }

    function sendEmail(Request $req){
        $email = $req->email;

        $userData = json_decode(user_table_model::select('id')->where('email', '=', $email)->get());
        
        $Ucount = count($userData);
        if($Ucount != 0){
            $code = rand(100000, 999999);
            $mtitle = "FORGOT PASSWORD OTP SENDER";
            $mShortMsg = "Don't shear this OPT anyone else";
            foreach($userData as $key){
                $id = $key->id;
            }

            $result = user_table_model::where('id',$id)->update([
                'remember_token' => $code
            ]);
            if($result == true){
                Mail::to($email)->send(new OTP_sender($mtitle,$mShortMsg,$code));
                return response()->json(['data' => 'success']);
            }else{
                return response()->json(['data' => 'error']);
            }

        }
        else{
            return response()->json(['data' => 'error']);
        }
 
    }

    function sendOTP(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $userOTP = $req->OTP;
        $email = $req->email;
        $page = $req->page;
        $userData = json_decode(user_table_model::select('remember_token','id')->where('email', '=', $email)->get());
        foreach($userData as $key){
            $DbOtp = $key->remember_token;
            $id = $key->id;
        }
        if($userOTP == $DbOtp){
            if($page == 'registration'){
                $result = user_table_model::where('email',$email)->update([
                    'remember_token' => null,
                    'email_verified_at' =>$dateTime
                ]);
                return response()->json(['data' => 'success']);
            }
            else if($page == 'login'){
                $req->session()->put('outerUserID', $id);
                $result = user_table_model::where('email',$email)->update([
                    'remember_token' => null,
                    'email_verified_at' =>$dateTime
                ]);
                return response()->json(['data' => 'success']);
            }
            else{
                $result = user_table_model::where('email',$email)->update([
                    'remember_token' => null,
                ]);
                return response()->json(['data' => 'success']);
            }
        }
        else{
            return response()->json(['data' => 'error']);
        }
        
    }

    function setPassword(Request $req){
        $email = $req->email;
        $newPass = $req->newPass;
        $result = user_table_model::where('email',$email)->update([
            'password' => $newPass
        ]);
        if($result == true){
            return response()->json(['data' => 'success']);
        }else{
            return response()->json(['data' => 'error']);
        }
    }

    function logout(Request $req){
        // $req->session()->flush();

        $req->session()->forget('outerUserID');
        return redirect('user/auth');

    }


}
