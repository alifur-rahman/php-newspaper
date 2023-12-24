<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_table_model;
use App\Models\VisitorModel;
use App\Models\post_table_model;
use App\Models\site_settings_model;
use App\Models\ePaper_table_model;


class HomeController extends Controller
{
   function homeIndex(){
      date_default_timezone_set("Asia/Dhaka"); // time zone
      $date = date("Y-m-d"); // today date

      $USER_IP = $_SERVER['REMOTE_ADDR']; //get user ip address
      $BN_uri = $_SERVER['HTTP_HOST']; // get this server host name
      $dateTime = date("Y-m-d h:i:sa"); // date tiem formate 1
      $dateTime2 = date("Y-m-d h:i:s"); // date time formate 2 
     
      VisitorModel::insert(['ip_address'=>$USER_IP,'visited_date'=>$date, 'visited_time'=>$dateTime]); // update Visitor Table DB
      // POST STATUES UPDATE QUERY 
      $post_idS = post_table_model::select('id')->get(); // get all post id from post table
     foreach ($post_idS as $key ) { // update all post publics date DB 
         post_table_model::where('id',$key['id'])->update(['public_date'=>$date]);
     }
      //   ePaper status query 
   //    $eData = ePaper_table_model::select('id')->get(); // get all post id from post table
   //   foreach ($eData as $key ) { // update all post publics date DB 
   //    ePaper_table_model::where('id',$key['id'])->update(['publish_at'=>$date]);
   //   }
    
      return view('home');
   }
}
 