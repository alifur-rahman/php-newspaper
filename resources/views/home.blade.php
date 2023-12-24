<?php 
    use App\Models\post_table_model;
    use App\Models\meta_setting_table_model;
    use App\Models\ads_table_model;

    $todayDate = date("Y-m-d");
    $PostLastIndexData = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->get()->last(); // last post data 
    $news2 = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('id', 'desc')->skip(1)->take(1)->first();
    $news3 = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('id', 'desc')->skip(2)->take(1)->first();
    $news4 = post_table_model::where('lang','=','bn')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('id', 'desc')->skip(3)->take(1)->first();

    $meataDataArray = meta_setting_table_model::where('id','=',1)->first(); 

    // ads 

    for ($i=1; $i < 13; $i++) { 
        $position_id = 'HP'.$i;
        ${'homeAds' . $i} = ads_table_model::where('position_id','=',$position_id)->where('expair_at','>=',$todayDate)->get();
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
@section('title', 'বাংলা খবর - বহুমুখী সংবাদ, ম্যাগাজিন এবং ব্লগ টেমপ্লেট')
@section('description', $meataDataArray->meta_keyword) 
@section('keywords', $meataDataArray->meta_description)
@section('content')

    <div class="main-content--section pbottom--30">
        <div class="container">
            <div class="main--content">
                <div class="post--items post--items-1 pd--30-0">
                    <div class="row gutter--15">

                        @if(isset($PostLastIndexData))
                            <div class="col-md-6">
                                    <div class="post--item post--layout-1 post--title-larger">
                                        <div class="post--img first-image">
                                            <a href="/single/{{base64_encode($PostLastIndexData->id)}}/{{str_replace(' ', '-', $PostLastIndexData->post_title)}}" class="thumb">
                                                <img src="{{asset('public/'.$PostLastIndexData->post_thumbnail)}}" alt="" />
                                            </a>
                                                <a href="/category/{{str_replace(' ', '-', $PostLastIndexData->catagories)}}" class="cat">{{$PostLastIndexData->catagories}}</a> 

                                                    <ul class="banner_icon" dir="rtl">
                                                        @if ($PostLastIndexData->new_trends == 1)
                                                            <li><a href="/filter/new_trends" class=""><i class="fa-solid fa-bolt"></i></a></li>
                                                        @endif
                                                        @if ($PostLastIndexData->featured_news == 1)
                                                            <li><a href="/filter/featured_news" class=""><i class="fa-solid fa-star"></i></a></li>
                                                        @endif
                                                        @if ($PostLastIndexData->most_popular == 1)
                                                            <li><a href="/filter/most_popular" class=""><i class="fa-solid fa-heart"></i></a></li>
                                                        @endif
                                                        @if ($PostLastIndexData->hot_news == 1)
                                                            <li><a href="/filter/hot_news" class=""><i class="fa-solid fa-fire"></i></a></li>
                                                        @endif
                                                    </ul>
                                
                                            
                                            

                                        
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                    <li><a href="#">{{EntoBnDate(date( "d-M-Y", strtotime($PostLastIndexData->public_date) )) }} </a></li>
                                                </ul> 
                                                <div class="title">
                                                    <h2 class="h4">
                                                        <a href="/single/{{base64_encode($PostLastIndexData->id)}}/{{str_replace(' ', '-', $PostLastIndexData->post_title)}}" class="btn-link">{{$PostLastIndexData->post_title}}</a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                            </div>
                        @endif
                        
                            <div class="col-md-6">
                                <div class="row gutter--15">
                                    @if(isset($news2))
                                        <div class="col-xs-6 col-xss-12">
                                            <div class="post--item post--layout-1 post--title-large">
                                                <div class="post--img second-post-img">
                                                    <a href="/single/{{base64_encode($news2->id)}}/{{str_replace(' ', '-', $news2->post_title)}}" class="thumb"><img src="{{asset('public/'.$news2->post_thumbnail)}}" alt="" /></a> <a href="/category/{{str_replace(' ', '-', $news2->catagories)}}" class="cat">{{$news2->catagories}}</a>
                                                    <ul class="banner_icon" dir="rtl">
                                                        {{-- @if ($news2->new_trends == 1)
                                                            <li><a href="/filter/new_trends" class=""><i class="fa-solid fa-bolt"></i></a></li>
                                                        @endif
                                                        @if ($news2->featured_news == 1)
                                                            <li><a href="/filter/featured_news" class=""><i class="fa-solid fa-star"></i></a></li>
                                                        @endif
                                                        @if ($news2->most_popular == 1)
                                                            <li><a href="/filter/most_popular" class=""><i class="fa-solid fa-heart"></i></a></li>
                                                        @endif
                                                        @if ($news2->hot_news == 1)
                                                            <li><a href="/filter/hot_news" class=""><i class="fa-solid fa-fire"></i></a></li>
                                                        @endif --}}
                                                    </ul>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                            <li><a href="#">{{EntoBnDate(date( "d-M-Y", strtotime($news2->public_date) )) }}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h2 class="h4"><a href="/single/{{base64_encode($news2->id)}}/{{str_replace(' ', '-', $news2->post_title)}}" class="btn-link">{{$news2->post_title}}</a></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($news3))
                                        <div class="col-xs-6 hidden-xss">
                                            <div class="post--item post--layout-1 post--title-large">
                                                <div class="post--img second-post-img">
                                                    <a href="/single/{{base64_encode($news3->id)}}/{{str_replace(' ', '-', $news3->post_title)}}" class="thumb"><img src="{{asset('public/'.$news3->post_thumbnail)}}" alt="" /></a> <a href="/category/{{str_replace(' ', '-', $news3->catagories)}}" class="cat">{{$news3->catagories}}</a>
                                                    <ul class="banner_icon" dir="rtl">
                                                        {{-- @if ($news3->new_trends == 1)
                                                            <li><a href="/filter/new_trends" class=""><i class="fa-solid fa-bolt"></i></a></li>
                                                        @endif
                                                        @if ($news3->featured_news == 1)
                                                            <li><a href="/filter/featured_news" class=""><i class="fa-solid fa-star"></i></a></li>
                                                        @endif
                                                        @if ($news3->most_popular == 1)
                                                            <li><a href="/filter/most_popular" class=""><i class="fa-solid fa-heart"></i></a></li>
                                                        @endif
                                                        @if ($news3->hot_news == 1)
                                                            <li><a href="/filter/hot_news" class=""><i class="fa-solid fa-fire"></i></a></li>
                                                        @endif --}}
                                                    </ul>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                            <li><a href="#"> {{EntoBnDate(date( "d-M-Y", strtotime($news3->public_date) )) }}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h2 class="h4"><a href="/single/{{base64_encode($news3->id)}}/{{str_replace(' ', '-', $news3->post_title)}}" class="btn-link">{{$news3->post_title}}</a></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($news4))
                                        <div class="col-sm-12 hidden-sm hidden-xs">
                                            <div class="post--item post--layout-1 post--title-larger">
                                                <div class="post--img second-post-img">
                                                    <a href="/single/{{base64_encode($news4->id)}}/{{str_replace(' ', '-', $news4->post_title)}}" class="thumb"><img src="{{asset('public/'.$news4->post_thumbnail)}}" alt="" /></a> <a href="/category/{{str_replace(' ', '-', $news4->catagories)}}" class="cat">{{$news4->catagories}}</a>
                                                    {{-- <ul class="banner_icon" dir="rtl">
                                                        @if ($news4->new_trends == 1)
                                                            <li><a href="/filter/new_trends" class=""><i class="fa-solid fa-bolt"></i></a></li>
                                                        @endif
                                                        @if ($news4->featured_news == 1)
                                                            <li><a href="/filter/featured_news" class=""><i class="fa-solid fa-star"></i></a></li>
                                                        @endif
                                                        @if ($news4->most_popular == 1)
                                                            <li><a href="/filter/most_popular" class=""><i class="fa-solid fa-heart"></i></a></li>
                                                        @endif
                                                        @if ($news4->hot_news == 1)
                                                            <li><a href="/filter/hot_news" class=""><i class="fa-solid fa-fire"></i></a></li>
                                                        @endif
                                                    </ul> --}}
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($news4->public_date) ))}}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h2 class="h4"><a href="/single/{{base64_encode($news4->id)}}/{{str_replace(' ', '-', $news4->post_title)}}" class="btn-link">{{$news4->post_title}}</a></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        
                       
                    </div>
                </div>
            </div>
            <div class="main--content">
                <div class="post--items post--items-1 al-mt-had">
                    <div class="row gutter--15 ">
                        {{-- home page ads position 1  --}}
                       
                        @if (isset($homeAds1))
                            <div class="Al_ads_area col-md-12 ads-775x200">
                                @foreach ($homeAds1 as $item)
                                    @if ($item->ads_type == "image")
                                    <div class=" adds-area al-ads-item text-left">   
                                        <a target="_blank" href="{{$item->URL}}"><img src=" {{asset('public/'.$item->image)}} " alt="Ads Position 1"></a>
                                    </div>
                                    @elseif($item->ads_type == "google")
                                        <div class="header--ad float--left float--sm-none al-ads-item header-ads-al text-left">
                                            <p>Can't passible show google ads in demo</p>
                                        </div>
                                    @elseif($item->ads_type == "script")
                                        <div class="header--ad float--left float--sm-none  al-ads-item header-ads-al text-left">
                                            {!!$item->script!!}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        
                        {{-- home page ads position 2  --}}
                        {{-- @if (isset($homeAds2))
                            <div class="Al_ads_area col-md-6 ads-775x200">
                                @foreach ($homeAds2 as $item)
                                    @if ($item->ads_type == "image")
                                        <div class="adds-area al-ads-item text-right">   
                                            <a target="_blank" href="{{$item->URL}}"><img src=" {{asset('public/'.$item->image)}}  " alt="Ads Position 2"></a>
                                        </div> 
                                    @elseif($item->ads_type == "google")
                                        <div class="header--ad float--right float--sm-none hidden-xs al-ads-item header-ads-al text-right">
                                            <p>Can't passible show google ads in demo</p>
                                        </div>
                                    @elseif($item->ads_type == "script")
                                        <div class="header--ad float--right float--sm-none hidden-xs al-ads-item header-ads-al text-right">
                                            {!!$item->script!!}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif --}}

                    </div>
                </div>
            </div>   
            <div class="row">
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true"> 
                    <div class="sticky-content-inner">
                        <div class="row">


                            @include('home-component.world-news-slider')
                            @include('home-component.Technology-news-slider')

                            {{-- home page ads position 3  --}}
                            @if (isset($homeAds3))
                            <div class="col-md-12 Al_ads_area ads-728x80">
                                @foreach ($homeAds3 as $item)
                                    @if ($item->ads_type == "image")
                                        <div class="ad--space al-ads-item">
                                            <a target="_blank" href="{{$item->URL}}"> <img style="height: 100px; width:100%" src=" {{asset('public/'.$item->image)}}" alt="Ads Position 3" class="center-block" /> </a>
                                        </div>
                                    @elseif($item->ads_type == "google")
                                        <div class="header--ad float--right float--sm-none al-ads-item ">
                                            <p>Can't passible show google ads in demo</p>
                                        </div>
                                    @elseif($item->ads_type == "script")
                                        <div class="header--ad float--right float--sm-none  al-ads-item ">
                                            {!!$item->script!!}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @endif


                            

                            @include('home-component.Financing-news-slider')
                            
                            {{-- <div class="col-md-12 ptop--30 pbottom--30">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">অর্থায়ন</h2>
                                    <div class="nav">
                                        <!-- <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts"> <i class="fa fa-long-arrow-left"></i> </a>  -->
                                        <span class="divider">/</span> 
                                        <a href="#" style="opacity:0;" class="next btn-link" > <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                                <div class="post--items post--items-2 items-carousel owl-carousel owl-theme" >
                                    <ul class="nav row">
                                        <li class="col-md-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img">
                                                    <a href="news-single-v1-boxed.html" class="thumb"><img src="{{asset('img/home-img/finance-01.jpg')}} " alt="" /></a> <a href="#" class="cat">ব্যবসা</a>
                                                    <a href="#" class="icon"><i class="fa-solid fa-star"></i></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">ভাসাগো</a></li>
                                                            <li><a href="#">আজ 03:30 am</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">
                                                                <a href="news-single-v1-boxed.html" class="btn-link">
                                                                    ভেরো ইওস এট অ্যাকুসামাস এট আইস্টো অডিও ডিগ্নিসিমোস ডুসিমাস কুই ব্লান্ডটিটিস প্রেসেনশিয়াম ভলুপট্যাটম ডিলেনিটি এটকে দুর্নীতিগ্রস্ত কোস ডলোরেস এট কোয়াস।
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-6">
                                            <ul class="nav row">
                                                <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src=" assets/img/home-img/finance-02.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জেপার</a></li>
                                                                    <li><a href="#">আজ 03:52 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-03.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-12"><hr class="divider" /></li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-04.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-05.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> 
                                    <ul class="nav row">
                                        <li class="col-md-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img">
                                                    <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-01.jpg" alt="" /></a> <a href="#" class="cat">Business</a>
                                                    <a href="#" class="icon"><i class="fa fa-star-o"></i></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">ভাসাগো</a></li>
                                                            <li><a href="#">আজ 03:30 am</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">
                                                                <a href="news-single-v1-boxed.html" class="btn-link">
                                                                    ভেরো ইওস এট অ্যাকুসামাস এট আইস্টো অডিও ডিগ্নিসিমোস ডুসিমাস কুই ব্লান্ডটিটিস প্রেসেনশিয়াম ভলুপট্যাটম ডিলেনিটি এটকে দুর্নীতিগ্রস্ত কোস ডলোরেস এট কোয়াস।
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-6">
                                            <ul class="nav row">
                                                <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-02.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-03.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-12"><hr class="divider" /></li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-04.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-xs-6">
                                                    <div class="post--item post--layout-2">
                                                        <div class="post--img">
                                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/finance-05.jpg" alt="" /></a>
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">জগতের স্রষ্টা</a></li>
                                                                    <li><a href="#">আজ দুপুর 03:02 pm</a></li>
                                                                </ul>
                                                                <div class="title">
                                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক হবে</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> 
                                </div>
                            </div> --}}

                            @include('home-component.politics-news-slider')
                            @include('home-component.sports-news-slider')
                        </div>
                    </div>
                </div>
                <div class="main--sidebar col-md-4 col-sm-5 ptop--30" data-sticky-content="true">
                    <div class="sticky-content-inner ">  
                        @include('sidebar-widget.featuresNews')

                        {{-- home page ads position 4  --}}
                      


                        @if (isset($homeAds4))
                        <div class="widget Al_ads_area ads-300x600">
                            <div class="widget--title">
                                <h2 class="h4">বিজ্ঞাপন</h2>
                                <i class="icon fa fa-bullhorn"></i>
                            </div> 
                            @foreach ($homeAds4 as $item)
                                @if ($item->ads_type == "image")
                                    <div class="ad--widget-img al-ads-item">
                                        <a target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Ads Position 4" /> </a>
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


                    </div>
                </div>
            </div>
            <!-- start adds area section  -->
            <div class="adds-section">
                <div class="row gutter--15">
                    {{-- home page ads position 5  --}}
                   
                    @if (isset($homeAds5))
                        <div class="Al_ads_area col-md-12 ads-775x200">
                            @foreach ($homeAds5 as $item)
                                @if ($item->ads_type == "image")
                                    <div class="adds-area al-ads-item">   
                                        <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}} " alt="Ads Position 5"></a>
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

                        {{-- home page ads position 6  --}}
                        {{-- @if (isset($homeAds6))
                            <div class="Al_ads_area col-md-6 ads-775x200">
                                @foreach ($homeAds6 as $item)
                                    @if ($item->ads_type == "image")
                                        <div class="adds-area al-ads-item">   
                                            <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}} " alt="Ads Position 5"></a>
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
            <!-- end adds area section  -->

            {{-- audio video  --}}
            {{-- <div class="main--content pd--30-0">
                <div class="post--items-title" data-ajax="tab">
                    <h2 class="h4">অডিও  &amp; ভিডিও</h2>
                    <div class="nav">
                        <!-- <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts"> <i class="fa fa-long-arrow-left"></i> </a>  -->
                        <span class="divider">/</span> 
                        <a href="#" style="opacity:0; visibility: hidden;" class="next btn-link" > <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
                <div class="post--items post--items-4 items-carousel owl-carousel owl-theme" >
                    <ul class="nav row" >
                        <li class="col-md-8">
                            <div class="post--item post--layout-1 post--type-video post--title-large">
                                <div class="post--img">
                                    <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-01.jpg" alt="" /></a> <a href="#" class="cat">তরঙ্গ</a> <a href="#" class="icon"><i class="fa fa-eye"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">সুকুবাস</a></li>
                                            <li><a href="#">আজ 03:52 pm</a></li>
                                        </ul>
                                        <div class="title">
                                            <h2 class="h4">
                                                <a href="news-single-v1-boxed.html" class="btn-link">
                                                    1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর স্ট্যান্ডার্ড অংশ আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। বিভাগ 1.10.32 এবং 1.10.33 "ডি ফিনিবাস বোনোরাম" থেকে
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider hidden-md hidden-lg" />
                        </li>
                        <li class="col-md-4">
                            <ul class="nav video-items">
                                <li>
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-02.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-02.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="post--item post--type-video post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-04.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mt-2">
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-05.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul> 
                    <ul class="nav row" >
                        <li class="col-md-8">
                            <div class="post--item post--layout-1 post--type-video post--title-large">
                                <div class="post--img">
                                    <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-01.jpg" alt="" /></a> <a href="#" class="cat">Wave</a> <a href="#" class="icon"><i class="fa fa-eye"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">সুকুবাস</a></li>
                                            <li><a href="#">আজ 03:52 pm</a></li>
                                        </ul>
                                        <div class="title">
                                            <h2 class="h4">
                                                <a href="news-single-v1-boxed.html" class="btn-link">
                                                    1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর স্ট্যান্ডার্ড অংশ আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। বিভাগ 1.10.32 এবং 1.10.33 "ডি ফিনিবাস বোনোরাম" থেকে
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider hidden-md hidden-lg" />
                        </li>
                        <li class="col-md-4">
                            <ul class="nav">
                                <li>
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-02.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-video post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-03.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-video post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-04.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-05.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul> 
                    <ul class="nav row" >
                        <li class="col-md-8">
                            <div class="post--item post--layout-1 post--type-video post--title-large">
                                <div class="post--img">
                                    <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-01.jpg" alt="" /></a> <a href="#" class="cat">Wave</a> <a href="#" class="icon"><i class="fa fa-eye"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">সুকুবাস</a></li>
                                            <li><a href="#">আজ 03:52 pm</a></li>
                                        </ul>
                                        <div class="title">
                                            <h2 class="h4">
                                                <a href="news-single-v1-boxed.html" class="btn-link">
                                                    1500 এর দশক থেকে ব্যবহৃত Lorem Ipsum-এর স্ট্যান্ডার্ড অংশ আগ্রহীদের জন্য নীচে পুনরুত্পাদন করা হয়েছে। বিভাগ 1.10.32 এবং 1.10.33 "ডি ফিনিবাস বোনোরাম" থেকে
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider hidden-md hidden-lg"/>
                        </li>
                        <li class="col-md-4">
                            <ul class="nav">
                                <li>
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-02.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-video post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-03.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-video post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-04.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post--item post--type-audio post--layout-3">
                                        <div class="post--img">
                                            <a href="news-single-v1-boxed.html" class="thumb"><img src="assets/img/home-img/audio-video-05.jpg" alt="" /></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">ম্যাক্লান জন</a></li>
                                                    <li><a href="#">16 এপ্রিল 2017</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="news-single-v1-boxed.html" class="btn-link">দীর্ঘদিন ধরে প্রতিষ্ঠিত সত্য যে একজন পাঠক পাঠযোগ্য দ্বারা বিভ্রান্ত হবেন</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul> 
                </div>
            </div> --}}


            
                {{-- home page ads position 7  --}}
           

            {{-- @if (isset($homeAds7))
                <div class="Al_ads_area ptop--30 ads-728x80">
                    @foreach ($homeAds7 as $item)
                        @if ($item->ads_type == "image")
                        <div class="ad--space pd--30-0 al-ads-item">   
                            <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}} " class="center-block" style="width: 80%; height:80px" alt="Ads Position 7"></a>
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

            <div class="row">
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="row">
                            @include('home-component.fitness-news-slider')
                            @include('home-component.lifestyle-news-slider')
                        </div>
                    </div>
                </div>
                <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                    <div class="sticky-content-inner">  
                        <div class="widget ">
                            <div class="addsd--widget pbottom--30">
                                <div class="row">
                                        {{-- home page ads position 8  --}}
                                 
                                    {{-- @if (isset($homeAds8))
                                        <div class="Al_ads_area col-sm-6 ads-165x125">
                                            @foreach ($homeAds8 as $item)
                                                @if ($item->ads_type == "image")
                                                    <div class="  al-ads-item">   
                                                        <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}} " alt="Ads Position 8"></a>
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



                                    {{-- home page ads position 9  --}}
                                    {{-- @if (isset($homeAds9))
                                        <div class="Al_ads_area col-sm-6 ads-165x125">
                                            @foreach ($homeAds9 as $item)
                                                @if ($item->ads_type == "image")
                                                    <div class="  al-ads-item">   
                                                        <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}} " alt="Ads Position 8"></a>
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

                            {{-- home page ads position 10  --}}
                           

                            @if (isset($homeAds10))
                            <div class="Al_ads_area ads-360x270">
                                @foreach ($homeAds10 as $item)
                                    @if ($item->ads_type == "image")
                                        <div class="addsd--widget al-ads-item header-ads-al">  
                                            <a target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Ads Position 10" /> </a> 
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


                        </div> 
                    </div>
                </div> 
            </div>
            <!-- start adds area section  -->
            <div class="adds-section mt-3">
                <div class="row gutter--15">
                   
                    @if (isset($homeAds11))
                        <div class="col-md-12 adds-area Al_ads_area ads-728x80">
                            @foreach ($homeAds11 as $item)
                                @if ($item->ads_type == "image")
                                    <div class="al-ads-item">
                                        <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}}" alt="Ads Position 11"></a>
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

                     {{-- home page ads position 12  --}}
                     {{-- @if (isset($homeAds12))
                        <div class="col-md-6 adds-area Al_ads_area ads-728x80">
                            @foreach ($homeAds12 as $item)
                                @if ($item->ads_type == "image")
                                    <div class="al-ads-item">
                                        <a target="_blank" href="{{$item->URL}}"><img src="{{asset('public/'.$item->image)}}" alt="Ads Position 11"></a>
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
            <!-- end adds area section  -->
        </div>
    </div>
@endsection