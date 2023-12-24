<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\VisitorModel;
use App\Models\post_table_model;
use App\Models\domain_table_model;

class admin_HomeController extends Controller
{

   function homeIndex(){
        date_default_timezone_set("Asia/Dhaka");
        $date = date("Y-m-d");

       

      $total_post = post_table_model::count();
      $today_post = post_table_model::where('public_date','=',$date)->count();
      $total_visitor = VisitorModel::count();
      $today_visitor = VisitorModel::where('visited_date','=',$date)->count();

      $today_letest_post = json_decode(post_table_model::where('lang','=','bn')->where('public_date','=',$date)->orderBy('id', 'desc')->get());
      $most_popular = json_decode(post_table_model::where('lang','=','bn')->where('public_date','=',$date)->where('most_popular','=',1)->orderBy('id', 'desc')->take(10)->get());
      $most_view_Array = json_decode(post_table_model::where('lang','=','bn')->where('public_date','=',$date)->orderBy('view', 'desc')->take(8)->get());
      
       
       return view('admin/home',[
           'total_post' => $total_post,
           'today_post' => $today_post,
           'total_visitor' => $total_visitor,
           'today_visitor' => $today_visitor,
           'today_letest_post'=>$today_letest_post,
           'most_popular'=>$most_popular,
           'most_view_Array'=>$most_view_Array
       ]);
   }

//    public function testDelete(){
//     $DeletefilePath = public_path('upload/site_setting/website_logo.jpg');
//     $DeleteResult = File::delete($DeletefilePath);
//     dd($DeleteResult);
//    }
}
 