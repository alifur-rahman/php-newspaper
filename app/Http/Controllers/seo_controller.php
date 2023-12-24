<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\meta_setting_table_model;
use App\Models\social_page_table_model;
use App\Models\social_link_table_model;


class seo_controller extends Controller
{
    function MetaSetting(){ //view meta setting 
        $allMetaData = meta_setting_table_model::all();
        if($allMetaData->count() == 0){
            $meta_keyword = "null";
            $meta_description = "null";
            $google_analytics_ID = "null";
        }
        else{
            foreach ($allMetaData as $key) {
                $meta_keyword = $key['meta_keyword'];
                $meta_description = $key['meta_description'];
                $google_analytics_ID = $key['google_analytics_ID'];
            }
        }
       
        return view('admin/seoMetaSetting',[ 
            'meta_keyword'=> $meta_keyword,
            'meta_description'=> $meta_description,
            'google_analytics_ID'=> $google_analytics_ID
        ]);
    }

    function UpdateMetaSetting(Request $req){ //update meta setting axios
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $meta_keyword = $req->input('meta_keyword');
        $meta_description = $req->input('meta_description'); 
        $google_analytics_ID = $req->input('google_analytics_ID');
        $result = meta_setting_table_model::where('id',1)->update([
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description, 
            'google_analytics_ID'=>$google_analytics_ID,
            'update_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }

    function socialPage(){ //view social page
        $allSocialPageData = social_page_table_model::all();
        if($allSocialPageData->count() == 0){
            $facebook_page_url = "null";
            $twitter_page_url = "null";
        }
        else{
            foreach ($allSocialPageData as $key) {
                $facebook_page_url = $key['facebook_page_url'];
                $twitter_page_url = $key['twitter_page_url'];
            }
        }
        return view('admin/seoSocialPage',[ 
            'facebook_page_url'=> $facebook_page_url,
            'twitter_page_url'=> $twitter_page_url
        ]);
       
        
       
        
    }

    function updateSocialPage(Request $req){ // update social page axios 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $facebook_page_url = $req->input('facebook_page_url');
        $twitter_page_url = $req->input('twitter_page_url'); 
        $result = social_page_table_model::where('id',1)->update([
            'facebook_page_url' => $facebook_page_url,
            'twitter_page_url' => $twitter_page_url, 
            'update_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }

    function socialLinks(){ //view social Links
        $allSocialLinkData = social_link_table_model::all();
        if($allSocialLinkData->count() == 0){
            $facebook = "null";
            $twitter = "null";
            $linkedin = "null";
            $printerest = "null";
            $vimemo = "null";
            $youtube = "null";
        }
        else{
            foreach ($allSocialLinkData as $key) {
                $facebook = $key['facebook'];
                $twitter = $key['twitter'];
                $linkedin = $key['linkedin'];
                $printerest = $key['printerest'];
                $vimemo = $key['vimemo'];
                $youtube = $key['youtube'];
            }
        }
        return view('admin/seoSocialLinks',[ 
            'facebook'=> $facebook,
            'twitter'=> $twitter,
            'linkedin'=> $linkedin,
            'printerest'=> $printerest,
            'vimemo'=> $vimemo,
            'youtube'=> $youtube,
        ]);
        
    }

    function updateSocialLinks(Request $req){ // update social links axios
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");

        $facebook = $req->input('facebook');
        $twitter = $req->input('twitter'); 
        $linkedin = $req->input('linkedin'); 
        $printerest = $req->input('printerest'); 
        $vimemo = $req->input('vimemo'); 
        $youtube = $req->input('youtube'); 

        $result = social_link_table_model::where('id',1)->update([
            'facebook' => $facebook,
            'twitter' => $twitter, 
            'linkedin'=>$linkedin,
            'printerest'=>$printerest,
            'vimemo'=>$vimemo,
            'youtube'=>$youtube,
            'update_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }
}
