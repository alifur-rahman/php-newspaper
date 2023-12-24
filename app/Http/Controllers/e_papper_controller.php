<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ePaper_table_model;

class e_papper_controller extends Controller
{

    // for user 
    function homeIndex(){
        $data = date("Y-m-d");

        $ePaperData =  ePaper_table_model::where('publish_at', '=', $data)->get();
        if(count($ePaperData) == 0){
            $lastDate =  ePaper_table_model::select('publish_at')->orderBy('id', 'desc')->take(1)->get();
            foreach ($lastDate as $key) {
                $lasd = $key['publish_at'];
            }
            $ePaperData =  ePaper_table_model::where('publish_at', '=', $lasd)->get();
            return view('ePapper.home',[
                'ePaperData'=>$ePaperData
            ]);
        }
        else{
            return view('ePapper.home',[
                'ePaperData'=>$ePaperData
            ]);
        }

       
    }



    // for admin 
   function createEpaper(){
        return view('admin/ePaper-create');
    }   

    function sendEpaperData(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $data = date("Y-m-d");

        $title = $req->input('title');
        $publish_at = $req->input('publish_at');
        // image 
        $filePath = $req->file('FileKey'); 
        $upload_path_string = 'upload/ePaper/'.$data.'/';
        $upload_path = public_path($upload_path_string); // upload path
       $fileName = str_replace(' ','-',$title).time() . '.' . $filePath->getClientOriginalExtension(); //new name
       $filePath->move($upload_path, $fileName); // upload

       $result= DB::table('epaper')->insert([
        'title'=>$title,
        'image'=> $upload_path_string.$fileName,
        'publish_at' => $publish_at,
        'create_at'=>$dateTime
        ]);
            if($result == true){
                return "success";
            }
            else{
                return "Fail";
        }
    }

    function lsitEpaper(){

       $ePaperData =  ePaper_table_model::get();
        return view('admin/ePaper-list',[
            'ePaperData'=>$ePaperData
        ]);
    }

    function getDataByDate(Request $req){
        $date = $req->input('date');
        $date = date("Y-m-d", strtotime($date));

        $ePaperData =  ePaper_table_model::where('publish_at', '=', $date)->get();

        function EntoBnDate($enData){
            $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
    
            $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 
    
            // convert all bangle char to English char 
            $bnDate = str_replace($search_array, $replace_array, $enData);  
            // $end_date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $en_number); 
            return $bnDate;
        }
        
        return response()->json(['data' => 'success', 'ePaperData' => $ePaperData,'sedate'=>EntoBnDate(date( "d-M-Y", strtotime($date) ))]);
    }

   
}
