<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\panel_setting_model;

class panel_setting_controller extends Controller
{
   function panelFaceView(){
        $allPanelSettingData = panel_setting_model::all();
        if($allPanelSettingData->count() == 0){
            $theme_color = "null";
        }
        else{
            foreach ($allPanelSettingData as $key) {
                $theme_color = $key['theme_color'];
            }
        }
        return view('admin/paNelFaceSettings',[ 
            'theme_color'=> $theme_color
        ]);

   }

   function updatePanelFace(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $theme_color = $req->input('theme_color');
        $result = panel_setting_model::where('id',1)->update([
            'theme_color' => $theme_color,
            'update_at' =>   $dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
   }
}
