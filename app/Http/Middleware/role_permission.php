<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\role_by_permission_table_model;

class role_permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role_permission
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role_permission )
    {
        
        $PermissionTableData = role_by_permission_table_model::select('active_modules')->where('id','=',session('role_id'))->get();
        foreach($PermissionTableData as $key){
            $active_modules = $key['active_modules'];
        }

        if($active_modules == "all"){
            return $next($request); 
        }
        else{
            $values = explode(",", $active_modules);
            $valueCout = count($values);
            $returnV = false;

            for($i=0; $i<=$valueCout-1; $i++){
                if($values[$i] == $role_permission){
                    $returnV = true;
                }
            }

            if($returnV == true){
                return $next($request); 
            }
            else{
                return redirect('/admin');
            }

        }

      
      
    }
}
