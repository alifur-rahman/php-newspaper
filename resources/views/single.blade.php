<?php 
     use App\Models\post_table_model;
     use App\Models\ads_table_model;

    $todayDate = date("Y-m-d");

    $hotNewsArray = post_table_model::where('lang','=','bn')->where('hot_news','=',1)->orderBy('id', 'desc')->take(4)->get();
    $new_trendsArray = post_table_model::where('lang','=','bn')->where('new_trends','=',1)->orderBy('id', 'desc')->take(4)->get();
    $most_view_Array = post_table_model::where('lang','=','bn')->orderBy('view', 'desc')->take(4)->get();

    
    // ads 

    for ($i=1; $i < 13; $i++) { 
        $position_id = 'ND'.$i;
        ${'newsDetails' . $i} = ads_table_model::where('position_id','=',$position_id)->where('expair_at','>=',$todayDate)->get();
    }

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
@section('title', $post_title)
@section('description', $catagories.','.$post_tags.' - '.$post_title)
@section('keywords', $catagories.','.$post_tags)
@section('content')
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="/" class="btn-link"><i class="fa fm fa-home"></i>বাড়ি</a>
            </li>
            <li><a href="/category/{{str_replace(' ', '-', $catagories)}}" class="btn-link">{{$catagories}}</a></li>
            <li class="active"><span>{{$post_title}} </span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--img">
                            <a href="#" class="thumb"><img src="{{asset('public/'.$post_thumbnail)}} " alt="" /></a> <a href="#" class="icon"><i class="fa-solid fa-star"></i></a>
                            {{-- <div class="post--map">
                                <p class="btn-link"><i class="fa fa-map-o"></i>গুগল ম্যাপে অবস্থান</p>
                                <div class="map--wrapper"><div data-map-latitude="23.790546" data-map-longitude="90.375583" data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div></div>
                            </div> --}}
                        </div>
                        <div class="post--cats">
                            <ul class="nav">
                                <li>
                                    <span><i class="fa fa-folder-open-o"></i></span>
                                </li>
                                @foreach(explode(',', $catagories) as $info) 
                                    <li><a href="/category/{{str_replace(' ', '-', $info)}}">{{$info}}</a></li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div class="post--info">
                            <ul class="nav meta"> 
                                <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                <li><a href="#">{{EntoBnDate(date( "d-F-Y", strtotime($public_date) )) }} </a></li>
                                <li>
                                    <span><i class="fa fm fa-eye"></i>{{$view}} </span>
                                </li>
                                {{-- <li>
                                    <a href="#"><i class="fa fm fa-comments-o"></i>02</a>
                                </li> --}}
                            </ul>
                            <div class="title"><h2 class="h4">{{$post_title}}</h2></div>
                        </div>
                        <div class="post--content">
                            <p>{{ $short_description }}</p>
                            <b style="margin-bottom: 10px; display:block">বিস্তারিতঃ </b>{!!$post_description !!}
                        </div>
                    </div>
                    {{-- <div class="ad--space pd--20-0-40">
                        <a href="#"> <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block" /> </a>
                    </div> --}}
                    <div class="post--tags">
                        <ul class="nav">
                            <li>
                                <span><i class="fa fa-tags"></i></span>
                            </li>

                            @foreach(explode(',', $post_tags) as $info) 
                                <li><a href="/tag/{{str_replace(' ', '-', $info)}}">{{$info}}</a></li>
                            @endforeach
                           
                        </ul>
                    </div>
                    <div class="post--social pbottom--30">
                        <span class="title"><i class="fa fa-share-alt"></i></span>
                        <div class="social--widget style--4">
                            <ul class="nav">
                                <li>
                                    <a id="sFacebook" target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a id="sTwitter" target="_blank" href="#"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                
                                <li>
                                    <a id="sLinkedin" target="_blank" href="#"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">  
                    {{-- <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">নিউজলেটার পান</h2>
                            <i class="icon fa fa-envelope-open-o"></i>
                        </div>
                        <div class="subscribe--widget">
                            <div class="content"><p>সর্বশেষ খবর, জনপ্রিয় খবর এবং একচেটিয়া আপডেট পেতে আমাদের নিউজলেটারে সদস্যতা নিন।</p></div>
                            <form
                                action="#"
                                method="post"
                                name="mc-embedded-subscribe-form"
                                target="_blank"
                                data-form="mailchimpAjax"
                            >
                                <div class="input-group">
                                    <input type="email" name="EMAIL" placeholder="ই-মেইল ঠিকানা" class="form-control" autocomplete="off" required />
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-lg btn-default active"><i class="fa-solid fa-paper-plane"></i></button>
                                    </div>
                                </div>
                                <div class="status"></div>
                            </form>
                        </div>
                    </div> --}}


                   @include('sidebar-widget.featuresNews')
                    {{-- news details ads position 1  --}}
                   

                    @if (isset($newsDetails1))
                        <div class="widget Al_ads_area ads-300x600">
                            <div class="widget--title">
                                <h2 class="h4">বিজ্ঞাপন</h2>
                                <i class="icon fa fa-bullhorn"></i>
                            </div> 
                            @foreach ($newsDetails1 as $item)
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



                    <div class="widget">
                        <div class="adds--widget">
                            <div class="row">
                                 {{-- news details ads position 2  --}}
                             


                                @if (isset($newsDetails2))
                                <div class="col-sm-12 Al_ads_area ads-360x270 hidden-xs">
                                    
                                    @foreach ($newsDetails2 as $item)
                                        @if ($item->ads_type == "image")
                                        <div class="al-ads-item">
                                            <a  target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Ads Position 2" /> </a>
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

                                    {{-- news details ads position 3  --}}
                                    {{-- @if (isset($newsDetails3))
                                    <div class="col-sm-6 Al_ads_area ads-360x270 hidden-xs">
                                        
                                        @foreach ($newsDetails3 as $item)
                                            @if ($item->ads_type == "image")
                                            <div class="al-ads-item">
                                                <a  target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Ads Position 2" /> </a>
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
                                    @endif --}}


                               

                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div> 
    </div>
</div>


@endsection