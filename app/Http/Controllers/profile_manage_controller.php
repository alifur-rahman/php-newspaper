<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_table_model;

class profile_manage_controller extends Controller
{
    function profileView(){

        $result =json_decode(admin_table_model::where('id','=',session('UserID'))->get());
        foreach($result as $item){
            $name = $item->name;
            $username = $item->username;
            $password = $item->password;
            $role = $item->role;
            $bio = $item->bio;
            $photo = $item->photo;
            $phone = $item->phone;
            $email = $item->email;
            $somthing_about = $item->somthing_about;
        }

        return view('admin/profile',[
            'name'=>$name,
            'username'=>$username,
            'password'=>$password,
            'role'=>$role,
            'email'=>$email,
            'bio'=>$bio,
            'somthing_about'=>$somthing_about,
            'phone'=>$phone,
            'photo'=>$photo
        ]);
    }


    function updateUserData(Request $req){

        $username = $req->input('username');
        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $bio = $req->input('bio');
        $more_about = $req->input('more_about');
        $u_id = session('UserID');

        $result = json_decode(admin_table_model::select('username','id')->get());
        $flg_count = 0;
        foreach($result as $row){
            if($row->username == $username){
                if($row->id != $u_id){
                    $flg_count++;
                }
               
            }
        }

        if($flg_count == 0){
            $result = admin_table_model::where('id','=',$u_id)->update([
                'name' => $name,
                'username' => $username,
                'email'=>$email,
                'phone'=>$phone,
                'bio'=>$bio,
                'somthing_about'=>$more_about
            ]);
            if($result == true){
                return "success";
            }else{
                return "Fail";
            }
        }
        else{
            return "duplicate";
        }




    }


    function updatePhoto(Request $req){
        $u_id = session('UserID');
        $filePath = $req->file('FileKey'); 
        $upload_path_string = 'upload/admin/';
        $upload_path = public_path($upload_path_string); // upload path
       $fileName = 'admin'.$u_id . '.' . $filePath->getClientOriginalExtension(); //new name
       $filePath->move($upload_path, $fileName); // upload

       $result = admin_table_model::where('id','=',$u_id)->update([
        'photo' =>$upload_path_string.$fileName
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }


    function changeUserPassword(Request $req){
       $c_pass = $req->input('c_pass');
        $result = json_decode(admin_table_model::select('password')->where('id','=',session('UserID'))->get());
        $flug = false;
        foreach($result as $row){
            $cottPass = $row->password;
            if($row->password == $c_pass){
                $flug = true;
            }
        }

        if($flug == true){
            $n_pass = $req->input('n_pass');
            $result = admin_table_model::where('id','=',session('UserID'))->update([
                'password' =>$n_pass
            ]);

            if($result == true){
                return "success";
            }else{
                return "Fail";
            }
        }
        else{
            return "duplicate";
        }

      
    }

}
