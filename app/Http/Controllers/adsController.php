<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ads_table_model;
use App\Models\ads_position_info_model;

class adsController extends Controller
{
   function allAdsIndex(){ //view all ads 
        $allAdsData = json_decode(ads_table_model::all());
        return view('admin/allAds',[ 
            'allAdsData'=> $allAdsData
        ]);
   }

   function CreateAdsIndex(){ // create add page index
        $QueryData = ads_position_info_model::distinct()->get(['page_name']);
        $PageData  = json_decode($QueryData);
        return view('admin/createAds',[ 
            'PageData'=> $PageData
        ]);
   }

   function positionByPage(Request $req){ //axious position by page select
        $value = $req->input('value');
        $data = ads_position_info_model::select('position_name','position_id','ads_size')->where('page_name', $value)->where('status', 'active')->get();
        return $data;
   }

   function insertNew(Request $req){ //axious insert ads in database 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $date = date("Y-m-d");
        $Page = $req->input('Page');
        $Position_id = $req->input('Position');
        $PositionNameByID = ads_position_info_model::select('position_name')->where('position_id', $Position_id)->get();
        $Position = $PositionNameByID[0]['position_name'];
        $adsType = $req->input('adsType');
        $expair_at = $req->input('expair_at');

     

        if($adsType == 'google'){
            $googleClint = $req->input('googleClint');
            $result= DB::table('ads_table')->insert([
                'ads_type'=>$adsType,
                'page'=>$Page,
                'position'=>$Position,
                'Position_id'=>$Position_id,
                'google_ad_client'=> $googleClint,
                'expair_at'=>$expair_at,
                'created_at'=>$dateTime
            ]);
        }
        else if($adsType == 'image'){
            $URL = $req->input('URL');
            // $filePath = $req->file('FileKey')->store('public/images'); 



            $filePath = $req->file('FileKey'); 
            $upload_path_string = 'upload/ads/'.$date.'/';
            $upload_path = public_path($upload_path_string); // upload path
            $fileName = time() . '.' . $filePath->getClientOriginalExtension(); //new name
            $filePath->move($upload_path, $fileName); // upload


            $result= DB::table('ads_table')->insert([
                'ads_type'=>$adsType,
                'page'=>$Page,
                'position'=>$Position,
                'Position_id'=>$Position_id,
                'image'=> $upload_path_string.$fileName,
                'URL'=> $URL,
                'expair_at'=>$expair_at,
                'created_at'=>$dateTime
            ]);
        }
        else if($adsType == 'script'){
            $scriptValue = $req->input('scriptValue');
            $result= DB::table('ads_table')->insert([
                'ads_type'=>$adsType,
                'page'=>$Page,
                'position'=>$Position,
                'Position_id'=>$Position_id,
                'script'=> $scriptValue,
                'expair_at'=>$expair_at,
                'created_at'=>$dateTime
            ]);
        }

        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    
   }
}   
