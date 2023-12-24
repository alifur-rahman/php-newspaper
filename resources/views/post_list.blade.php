<?php 
     use App\Models\meta_setting_table_model;
     use App\Models\ads_table_model;
     
    $todayDate = date("Y-m-d");
  
    
    $meataDataArray = meta_setting_table_model::where('id','=',1)->first(); 

    $position_id = 'NL1';
    $newsAds1 = ads_table_model::where('position_id','=',$position_id)->where('expair_at','>=',$todayDate)->get();
    function EntoBnDate($enData){
        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");

        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 

        // convert all bangle char to English char 
        $bnDate = str_replace($search_array, $replace_array, $enData);  
        // $end_date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $en_number); 
        return $bnDate;
    }
?>
@extends('Layout.app')
@section('title', $cat_name)
@section('description', $meataDataArray->meta_keyword) 
@section('keywords', $meataDataArray->meta_description)
@section('content')
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="/" class="btn-link"><i class="fa fm fa-home"></i>হোম </a>
            </li>
            <li class="active"><span>ক্যাটাগরি</span></li>
            <li class="active"><span>{{$cat_name}}</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row" style="transform: none;">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="post--items post--items-5 pd--30-0">
                    @if (count($arrayData) ==0) 
                        <p style="text-align: center; color:red">Don't have Data Right now </p>
                    @else
                    <ul class="nav">
                        @foreach ($arrayData as $item)
                            <li>
                                <div class="post--item post--title-larger">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                            <div class="post--img">
                                                <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}} " alt="" data-rjs="2" /></a>
                                                <a href="/category/{{str_replace(' ', '-', $item->catagories)}}" class="cat">{{$item->catagories}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}">নিজস্ব প্রতিবেদক </a></li>
                                                    <li><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}">{{EntoBnDate(date( "d-M-Y", strtotime($item->public_date) )) }}</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4">
                                                        <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="post--content">
                                                <p>
                                                    {{ $item->short_description }}
                                                    {{-- {{html_entity_decode(substr($item->post_description,0,200))}}    --}}
                                                   
                                                </p>
                                            </div>
                                            <div class="post--action"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}">পড়া চালিয়ে যান...</a></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                        
                    </div>
                    
                  
                    <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                        <ul class="pagination float--right">
                            {{ $arrayData->onEachSide(1)->links() }}
                        </ul>
                    </div>
                </div>
            </div>




            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"> 

                    {{-- @include('sidebar-widget.category_count') --}}
                    @include('sidebar-widget.tag_list')
                    {{-- @include('sidebar-widget.archives_count') --}}
                    @include('sidebar-widget.keep-in-touch')
                    @include('sidebar-widget.newslatter')
                    @include('sidebar-widget.featuresNews')


                   
                    @if (isset($newsAds1))
                    <div class="widget Al_ads_area ads-300x600">
                        <div class="widget--title">
                            <h2 class="h4">বিজ্ঞাপন</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div> 
                        @foreach ($newsAds1 as $item)
                            @if ($item->ads_type == "image")
                            <div class="adds--widget al-ads-item header-ads-al">
                                <a target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Ads Position 1" /> </a>
                            </div>
                            @elseif($item->ads_type == "google")
                                <div class="header--ad float--right float--sm-none hidden-xs al-ads-item header-ads-al">
                                    <p>Can't passible show google ads in demo</p>
                                </div>
                            @elseif($item->ads_type == "script")
                                <div class="header--ad float--right float--sm-none hidden-xs al-ads-item header-ads-al">
                                    {!!$item->script!!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endif


                


                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 400px; height: 3220px;"></div>
                        </div>
                        <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection