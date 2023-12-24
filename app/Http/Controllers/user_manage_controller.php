<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dashboard_modules_table_model;
use App\Models\role_by_permission_table_model;  
use App\Models\admin_table_model;
class user_manage_controller extends Controller
{
    function role_permission(){
        $result = json_decode(dashboard_modules_table_model::select('parents')->orderBy('order_key', 'ASC')->get());
        $rolesDetails = json_decode(role_by_permission_table_model::all()->skip(1));
        $controllerResult = array_unique($result,SORT_REGULAR );
        return view('admin/role-permission',[
            'controllerResult'=> $controllerResult,
            'rolesDetails'=> $rolesDetails
        ]);
    }


    function sendRoleData(Request $req){
        $role_name = $req->input('role_name');
        $modules = $req->input('active_Modules');
        $result = role_by_permission_table_model::select('role')->get();
        $worrning = false;
        foreach($result as $row){
            if($row['role'] == $role_name){
                $worrning = true;
            }
        }

        if($worrning == false){
            $inresult= DB::table('role_by_permission')->insert([
                'role'=>$role_name,
                'active_modules'=>$modules
            ]);
            if($inresult == true){
                return "success";
            }else{
                return "Fail";
            }
        }
        else{
            return "duplicate";
        }


       

        
    }

    function editRoles($role_id){
        $result = json_decode(dashboard_modules_table_model::select('parents')->orderBy('order_key', 'ASC')->get());
        $rolesDetails = json_decode(role_by_permission_table_model::all()->skip(1));
        $controllerResult = array_unique($result,SORT_REGULAR );
        $unique_data = json_decode(role_by_permission_table_model::where('id','=', base64_decode($role_id))->get());
        foreach($unique_data as $item){
            $u_role = $item->role;
            $u_active_modules = $item->active_modules;
        }
        return view('admin/editRoles',[
            'controllerResult'=> $controllerResult,
            'rolesDetails'=> $rolesDetails,
            'role'=>$u_role,
            'active_modules'=> $u_active_modules,
            'role_id'=>$role_id
        ]);   
    }

    function udateRoleData(Request $req){
        $role_name = $req->input('role_name');
        $modules = $req->input('active_Modules');
        $role_id = base64_decode($req->input('role_id'));
        $result = role_by_permission_table_model::where('id',$role_id)->update([
            'role' => $role_name,
            'active_modules' => $modules
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
       
    }

    function deleteRoles($role_id){ // delete post category
        $role_id = base64_decode($role_id);
        $result = role_by_permission_table_model::where('id',$role_id)->delete();
         if($result == true){
             return redirect('admin/user/roles_permission');
         }
    }

    function showRoleData (){
        return json_decode(role_by_permission_table_model::select('id','role')->get());
    }

    function insertUserData(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $username = $req->input('username');

        $result = admin_table_model::select('username')->get();
        $worrning = false;
        foreach($result as $row){
            if($row['username'] == $username){
                $worrning = true;
            }
        }

        if($worrning == false){
            $dateTime = date("Y-m-d h:i:s");
            $name = $req->input('name');
            $password = $req->input('password');
            $email = $req->input('email');
            $role_id = $req->input('role_id');
            $result = json_decode(role_by_permission_table_model::select('role')->where('id', '=', base64_decode($role_id))->get());
            foreach($result as $row){
                $role = $row->role;
            }
            $inresult= DB::table('admin_table')->insert([
                'name'=>$name,
                'username'=>$username,
                'password'=> $password,
                'role'=> $role,
                'role_id'=>base64_decode($role_id),
                'email'=> $email,
                'create_at'=>$dateTime
    
            ]);
            if($inresult == true){
                return "success";
            }else{
                return "Fail";
            }
        }
        else{
            return "duplicate";
        }

      

    }

    function createUser(){
        return view('admin/createUser');
    }


    function listUser(){
        $result = admin_table_model::all()->skip(1);

        return view('admin/user-list',[
            'result' => $result 
        ]);
    }
    
    function deleteUser($u_id){ // delete post category
        $u_id = base64_decode($u_id);
        $result = admin_table_model::where('id',$u_id)->delete();
         if($result == true){
             return redirect('admin/user/list_user');
         }
    }


    function editUser($u_id){
        $unique_data = json_decode(admin_table_model::where('id','=', base64_decode($u_id))->get());



        foreach($unique_data as $item){
            $name = $item->name;
            $username = $item->username;
            $role = $item->role;
            $email = $item->email;
            $password = $item->password;
        }


        return view('admin/editUser',[
            'name'=>$name,
            'username'=>$username,
            'role'=>$role,
            'email'=>$email,
            'password'=>$password,
            'u_id'=>$u_id
        ]);   
    }

    
    function updateUserData(Request $req){
        $username = $req->input('username');
        $name = $req->input('name');
        $email = $req->input('email');
        $role_id = $req->input('role_id');
        $u_id = $req->input('u_id');
        $result = json_decode(role_by_permission_table_model::select('role')->where('id', '=', base64_decode($role_id))->get());
        foreach($result as $row){
            $role = $row->role;
        }

        $result = admin_table_model::where('id',base64_decode($u_id))->update([
            'name' => $name,
            'username' => $username,
            'role'=>$role,
            'role_id'=>base64_decode($role_id),
            'email'=>$email
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }

    }

    function updateUserPassword(Request $req){
        $password = $req->input('password');
        $u_id = $req->input('u_id');

        $result = admin_table_model::where('id',base64_decode($u_id))->update([
            'password' => $password,
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }

    }

}
