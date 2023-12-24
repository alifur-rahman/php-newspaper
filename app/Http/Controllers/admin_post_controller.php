<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\post_table_model;
use App\Models\category_table_model;
use App\Models\tags_table_model;
class admin_post_controller extends Controller
{
    function allPostIndex(){ //post route
        $allPostData = json_decode(post_table_model::all());
        return view('admin/allPost',[ 
            'allPostData'=> $allPostData
        ]);
    }

    function createPost(){ //create post route
        // $allCategoryData = json_decode(category_table_model::where('status','=','Published')->get());
        $allCatDataBn = json_decode(category_table_model::where('lang','=','bn')->where('status','=','Published')->get());
        $allCatDataEn = json_decode(category_table_model::where('lang','=','en')->where('status','=','Published')->get());
        
        return view('admin/createPost',[
            'allCatDataBn'=>$allCatDataBn,
            'allCatDataEn'=>$allCatDataEn
        ]);
    }

    function catNameByLang(Request $req){ // return category name axios
        $lang = $req->input('lang');
        return json_decode(category_table_model::where('lang','=',$lang)->where('status','=','Published')->get());

    }

    function insertPost(Request $req){ //insert news post 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $data = date("Y-m-d");

        $language = $req->input('language');
        $post_name = $req->input('post_title');
        $headline = $req->input('headline');
        $category = $req->input('category');
        $short_description = $req->input('short_description');
        $post_content = $req->input('post_content');
        // image 
        //  $filePath = $req->file('FileKey')->store('public/images'); //old
         $filePath = $req->file('FileKey'); 
         $upload_path_string = 'upload/posts/'.$data.'/';
         $upload_path = public_path($upload_path_string); // upload path
        $fileName = time() . '.' . $filePath->getClientOriginalExtension(); //new name
        $filePath->move($upload_path, $fileName); // upload

        // end img 
        $tags = $req->input('tags');
        $status = $req->input('status');
        $publish_at = $req->input('publish_at');
        $featured_news = $req->input('featured_news');
        $most_popular = $req->input('most_popular');
        $hot_news = $req->input('hot_news');
        $new_trends = $req->input('new_trends');

        $result= DB::table('post_table')->insert([
            'lang'=>$language,
            'post_title'=>$post_name,
            'headline'=>$headline,
            'catagories'=>$category,
            'short_description'=>$short_description,
            'post_description'=>$post_content,
            'post_thumbnail'=> $upload_path_string.$fileName,
            'post_tags'=>$tags,
            'status'=>$status,
            'public_date' => $publish_at,
            'created_at'=>$dateTime,
            'featured_news'=>$featured_news,
            'most_popular'=>$most_popular,
            'hot_news'=>$hot_news,
            'new_trends'=>$new_trends
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
        
    }

    function postCategories(){ //post catagory route
        $allCatBnData = json_decode(category_table_model::where('lang','=','bn')->get());
        $allCatEnData = json_decode(category_table_model::where('lang','=','en')->get());
        return view('admin/postCategories',[
            'allCatBnData'=>$allCatBnData,
            'allCatEnData'=>$allCatEnData
        ]);
    }

    function insertCategory(Request $req){ //insert categories 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");
        $lang = $req->input('lang');
        $cat_name = $req->input('cat_name');
        $cat_desc = $req->input('cat_desc');
        $cat_status = $req->input('cat_status');
        $result= DB::table('catagory_table')->insert([
            'lang'=>$lang,
            'Name'=>$cat_name,
            'description'=>$cat_desc,
            'status'=>$cat_status,
            'created_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
        
    }

    function editPostCategories($cat_id){ // edit post categories page
        $allCatBnData = json_decode(category_table_model::where('lang','=','bn')->get());
        $allCatEnData = json_decode(category_table_model::where('lang','=','en')->get());
        $singleCategoryData = category_table_model::where('id','=',base64_decode($cat_id))->get();
        foreach ($singleCategoryData as $key ) {
            $Name = $key['Name'];
            $description = $key['description'];
            $status = $key['status'];
        }
        return view('admin/editPostCategories',[
            'allCatBnData'=>$allCatBnData,
            'allCatEnData'=>$allCatEnData,
            'Name'=>$Name,
            'description'=>$description,
            'status'=>$status,
            'cat_id' => $cat_id
        ]);
    }

    function updateCategory(Request $req){ // update category data axios
        $cat_name = $req->input('cat_name');
        $cat_id = base64_decode($req->input('cat_id'));
        $cat_desc = $req->input('cat_desc');
        $cat_status = $req->input('cat_status');


        $result = category_table_model::where('id',$cat_id)->update([
            'Name' => $cat_name,
            'description' => $cat_desc, 
            'status'=>$cat_status
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
    }
    
    function deletePostCategories($cat_id){ // delete post category
       $cat_id = base64_decode($cat_id);
       $result = category_table_model::where('id',$cat_id)->delete();
        if($result == true){
            return redirect('admin/news/post-categories');
        }
    }

    function postTags(){ //post tags route
        $allTagsData = json_decode(tags_table_model::all());
        return view('admin/postTags',[
            'allTagsData'=>$allTagsData
        ]);
    }

    function insertTags(Request $req){ //insert tags 
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("Y-m-d h:i:s");

        $tag_name = $req->input('tag_name');
        $tag_desc = $req->input('tag_desc');
        $tag_status = $req->input('tag_status');
        $result= DB::table('tag_table')->insert([
            'Name'=>$tag_name,
            'description'=>$tag_desc,
            'status'=>$tag_status,
            'created_at'=>$dateTime
        ]);
        if($result == true){
            return "success";
        }else{
            return "Fail";
        }
        
        
    }
}
