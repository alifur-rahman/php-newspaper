<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site_settings_model;

class site_setting_controller extends Controller
{
    function siteSettingView(){ // view site setting 
        $allSiteSettingData = site_settings_model::all();
        if($allSiteSettingData->count() == 0){
            $website_title = "null";
            $website_logo = "null";
            $footer_logo = "null";
            $favicon_icon = "null";
        }
        else{
            foreach ($allSiteSettingData as $key) {
                $website_title = $key['website_title'];
                $website_logo = $key['website_logo'];
                $footer_logo = $key['footer_logo'];
                $favicon_icon = $key['favicon_icon'];
            }
        }
        return view('admin/siteSettings',[ 
            'website_title'=> $website_title,
            'website_logo'=> $website_logo,
            'footer_logo' => $footer_logo,
            'favicon_icon' => $favicon_icon
        ]);
       

    }

    function updateSiteSetting(Request $req){ //update site setting 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");

        $website_title = $req->input('website_title');
        $website_logo = $req->file('website_logo'); 
        $footer_logo = $req->file('footer_logo'); 
        $favicon_icon = $req->file('favicon_icon'); 

        $upload_path_string = 'upload/site_setting/';
        $upload_path = public_path($upload_path_string);   

        if($website_logo == "" OR $footer_logo == "" OR $favicon_icon == ""){
            $siteSettingData = site_settings_model::get();
            if($website_logo == ""){
                foreach ($siteSettingData as $key) {
                    $website_logo_newname = $key['website_logo'];
                }
            }
            else{
                $website_logo_name = "website_logo" . '.' . $website_logo->getClientOriginalExtension();
                $website_logo->move($upload_path, $website_logo_name);
                $website_logo_newname =  $upload_path_string.$website_logo_name;
            }
            if($footer_logo == ""){
                foreach ($siteSettingData as $key) {
                    $footer_logo_newname = $key['footer_logo'];
                }
            }  
            else{
                $footer_logo_name = "footer_logo" . '.' . $footer_logo->getClientOriginalExtension();
                $footer_logo->move($upload_path, $footer_logo_name);
                $footer_logo_newname =  $upload_path_string.$footer_logo_name;
            }
            if($favicon_icon == ""){
                foreach ($siteSettingData as $key) {
                    $favicon_icon_newname = $key['favicon_icon'];
                }
            }
            else{
                $favicon_icon_name = "favicon_icon" . '.' . $favicon_icon->getClientOriginalExtension();
                $favicon_icon->move($upload_path, $favicon_icon_name);
                $favicon_icon_newname =  $upload_path_string.$favicon_icon_name;
            }
           
        } 
       
        $result = site_settings_model::where('id',1)->update([
            'website_title' => $website_title,
            'website_logo' => $website_logo_newname, 
            'footer_logo'=> $footer_logo_newname,
            'favicon_icon'=>$favicon_icon_newname,
            'update_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }
}
