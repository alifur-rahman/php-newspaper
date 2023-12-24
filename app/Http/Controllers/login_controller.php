<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_table_model;

class login_controller extends Controller
{
    function adminLogin(){
        return view('admin/login');
    }

    function onAdminLogin(Request $req){
       $username = $req->input('username');
       $password = $req->input('password');
       $userCount = admin_table_model::where('username','=',$username)->where('password','=',$password)->count();
       
       if($userCount == 1){
            $adminRole = admin_table_model::select('id','name','role','role_id')->where('username','=',$username)->where('password','=',$password)->get();
          foreach($adminRole as $key){
              $adminRole = $key['role'];
              $adminRoleId = $key['role_id'];
              $name = $key['name'];
              $userID = $key['id'];
          }
            $req->session()->put('single_user',$username);
            $req->session()->put('role',$adminRole);
            $req->session()->put('role_id',$adminRoleId);
            $req->session()->put('UserID', $userID);
            $req->session()->put('name',$name);
           return 1;
           
       }
       else if($userCount == 0){
            return "Fail to Login";
       }
       else if($userCount > 1){
        return "Duplicate User can't login";
       }
       else{
          return "Failed To Connect Database"; 
       }


    }

    function onAdminLogOut(Request $req){
        // $req->session()->flush();

        $req->session()->forget('single_user');
        $req->session()->forget('role');
        $req->session()->forget('role_id');
        $req->session()->forget('UserID');
        $req->session()->forget('name');
        return redirect('admin/login');

    }
}
