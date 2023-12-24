<?php 
use App\Models\social_link_table_model;

 // FOOTER CONTROL 
$social_links_data  =social_link_table_model::where('id','=',1)->first();  
?>
<div class="widget">
    <div class="widget--title">
        <h2 class="h4">যোগাযোগ রেখো</h2>
        <i class="icon fa fa-share-alt"></i>
    </div>
    <div class="social--widget style--1">
        <ul class="nav">
            <li class="facebook">
                <a href="{{$social_links_data->facebook}} ">
                    <span class="icon"><i class="fa-brands fa-facebook-f"></i></span> <span class="count">521</span> <span class="title ">পছন্দ</span>৷
                </a>
            </li>
            <li class="twitter">
                <a href="{{$social_links_data->twitter}} ">
                    <span class="icon"><i class="fa-brands fa-twitter"></i></span> <span class="count">3297</span> <span class="title"> অনুগামীরা</span>
                </a>
            </li>
            <li class="linkedin">
                <a href="{{$social_links_data->linkedin}}">
                    <span class="icon"><i class="fa-brands fa-linkedin"></i></span> <span class="count">596282</span> <span class="title ">অনুসারী</span>
                </a>
            </li>
            <li class="printerest">
                <a href="{{$social_links_data->printerest}}">
                    <span class="icon"><i class="fa-brands fa-pinterest-square"></i></span> <span class="count">521</span> <span class="title"> গ্রাহক</span>
                </a>
            </li>
            <li class="vimeo">
                <a href="{{$social_links_data->vimemo}}">
                    <span class="icon"><i class="fa-brands fa-vimeo"></i></span> <span class="count">3297</span> <span class="title"> অনুগামীরা</span>
                </a>
            </li>
            <li class="youtube">
                <a href="{{$social_links_data->youtube}}">
                    <span class="icon"><i class="fa-brands fa-youtube-square"></i></span> <span class="count">596282</span> <span class="title ">সাবস্ক্রাইবার</span>
                </a>
            </li>
        </ul>
    </div>
</div>