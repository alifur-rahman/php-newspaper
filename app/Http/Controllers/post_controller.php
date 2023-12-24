<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_table_model;

class post_controller extends Controller
{
    function singlePost($post_id,$post_title){ // show single post details

        $singlePostData = post_table_model::where('id','=',base64_decode($post_id))->get(); // get all data 
        foreach ($singlePostData as $key ) {
            $post_title = $key['post_title'];
            $catagories = $key['catagories'];
            $post_description = $key['post_description'];
            $post_thumbnail = $key['post_thumbnail'];
            $post_tags = $key['post_tags'];
            $view = $key['view'];
            $public_date = $key['public_date'];
            $featured_news = $key['featured_news'];
            $most_popular = $key['most_popular'];
            $hot_news = $key['hot_news'];
            $new_trends = $key['new_trends'];
            $short_description = $key['short_description'];
        }
        
        post_table_model::where('id',base64_decode($post_id))->update([ // update view count 
            'view' => $view+1
        ]);
        return view('single',[
            'enC_id'=>$post_id,
            'post_title'=>$post_title,
            'catagories'=>$catagories,
            'post_description'=>$post_description,
            'post_thumbnail'=>$post_thumbnail,
            'post_tags'=>$post_tags,
            'view'=>$view,
            'public_date'=>$public_date,
            'featured_news'=>$featured_news,
            'most_popular'=>$most_popular,
            'hot_news'=>$hot_news,
            'new_trends'=>$new_trends,
            'short_description'=>$short_description
        ]);
    }


    function postList($keyword){
        $todayDate = date("Y-m-d");
        $keyword = str_replace('-', ' ', $keyword);
       $arrayData = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->where(function ($query) use($keyword) {
            $query->where('catagories', 'like', '%' . $keyword . '%')
               ->orWhere('post_tags', 'like', '%' . $keyword . '%')
               ->orWhere('post_title', 'like', '%' . $keyword. '%');
        })->orderby('id','desc')->paginate(8);
        // return $arrayData;
       
        return view('post_list', [
            'cat_name'=>str_replace('-', ' ', $keyword),
            'arrayData'=>$arrayData
        ]);
    }

    function spFilter($keyword){
        $todayDate = date("Y-m-d");
        if($keyword == 'featured_news'){
            $cat_name = 'আলোচিত সংবাদ';
        }
        else if($keyword == 'most_popular'){
            $cat_name = 'সবচেয়ে জনপ্রিয়';
        }
        else if($keyword == 'hot_news'){
            $cat_name = 'গরম খবর';
        }
        else if($keyword == 'new_trends'){
            $cat_name = 'নতুন প্রবণতা';
        }
        else if($keyword == 'view'){
            $cat_name = 'সর্বাধিক দেখা';
        }
        if($keyword != 'view'){
            $arrayData = post_table_model::where('lang','=','bn')->where($keyword,'=','1')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderby('id','desc')->paginate(8);
        }
        else{
            $arrayData = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('view', 'desc')->skip(0)->take(10)->paginate(8);
        }
        return view('post_list', [
            'cat_name'=>$cat_name,
            'arrayData'=>$arrayData
        ]);

        
    }
}
