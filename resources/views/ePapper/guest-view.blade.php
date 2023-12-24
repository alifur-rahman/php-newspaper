
@extends('Layout.app')
@section('title', 'E-Paper')
@section('content')

<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row" style="transform: none;">
            <div class="main--sidebar col-md-2 col-sm-4 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"> 
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">আজকের পত্রিকা </h2>
                            <i class="icon fa fa-folder-open-o"></i>
                        </div>
                        <div class="nav--widget nav-bg">
                            <div class="d-flex align-items-start">
                                <div class="custom-nav-pils nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                        @for ($i = 0; $i < count($ePaperData); $i++)
                                            @if ($i == 0)
                                                <button class="nav-link active" id="v-pills-home-tab-{{ $i }}" data-bs-toggle="pill" data-bs-target="#v-pills-home-{{ $i }}" type="button" role="tab" aria-controls="v-pills-home-{{ $i }}" aria-selected="true"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""><p>{{ $ePaperData[$i]['title'] }} </p></button>
                                            @else
                                                <button class="nav-link" id="v-pills-profile-tab-{{ $i }}" data-bs-toggle="pill" data-bs-target="#v-pills-profile-{{ $i }}" type="button" role="tab" aria-controls="v-pills-profile-{{ $i }}" aria-selected="false"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""><p>{{ $ePaperData[$i]['title'] }} </p></button>
                                            @endif
                                           
                                        @endfor
                                </div>

                            </div>
                        </div>
                    </div> 
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">বিজ্ঞাপন</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>
                        <div class="adds--widget">
                            <a href="#"> <img src="{{asset('public/img/ads-img/orginal.jpg')}}" alt="" ngh0uci4s="" data-rjs="2" /> </a>
                        </div>
                    </div>  
                </div>
            </div>


            <div class="main--content col-md-8 col-sm-4" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="post--items post--items-5 pd--30-0">
                        <div class="tab-content" id="v-pills-tabContent">
                          
                            @for ($i = 0; $i < count($ePaperData); $i++)
                                @if ($i == 0)
                                    <div class="tab-pane fade show active" id="v-pills-home-{{ $i }}" role="tabpanel" aria-labelledby="v-pills-home-tab-{{ $i }}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""></div>

                                @else
                                    <div class="tab-pane fade" id="v-pills-profile-{{ $i }}" role="tabpanel" aria-labelledby="v-pills-profile-tab-{{ $i }}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""></div>
                                @endif
                            
                            @endfor


                        </div>
                    </div>
                    <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30 text-center"> 
                        <ul class="pagination text-center">
                            <li>
                                <a href="#">প্রথম পাতা </a> 
                            </li> 
                            <li>
                            <div class="pagination--wrapper clearfix bdtop--1 bd--color-2"> 
                                    <ul class="pagination float--right">
                                        <li>
                                            <a href="#"><i class="fa fa-long-arrow-left"></i></a>
                                        </li>
                                        <li><a href="#">01</a></li>
                                        <li class="active"><span>02</span></li>
                                        <li><a href="#">03</a></li>
                                        <li><i class="fa fa-angle-double-right"></i> <i class="fa fa-angle-double-right"></i> <i class="fa fa-angle-double-right"></i></li>
                                        <li><a href="#">20</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">শেষ পাতা </a> 
                            </li> 
                        </ul>
                    </div> 
                </div>
            </div>

            <div class="main--sidebar col-md-2 col-sm-4 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"> 
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">ক্যালেন্ডার </h2>
                            <i class="icon fa fa-folder-open-o"></i>
                        </div>
                        <div class="nav--widget nav-bg"> 
                            <div class="celender">
                                <div class="wrapper"> 
                                    <div class="container-calendar">
                                        
                                        <div class="button-container-calendar">
                                            <button id="previous" onclick="previous()">&#8249;</button>
                                            <h3 id="monthAndYear"></h3>
                                            <button id="next" onclick="next()">&#8250;</button>
                                        </div>
                                        
                                        <table class="table-calendar" id="calendar" data-lang="en">
                                            <thead id="thead-month"></thead>
                                            <tbody id="calendar-body"></tbody>
                                        </table>
                                        
                                        <div class="footer-container-calendar"> 
                                            <select id="month" onchange="jump()"> 
                                                <option value=0>জানুয়ারি</option>
                                                <option value=1>ফেব্রুয়ারী</option>
                                                <option value=2>মার্চ</option>
                                                <option value=3>এপ্রিল</option>
                                                <option value=4>মে</option>
                                                <option value=5>জুন</option>
                                                <option value=6>জুলাই</option>
                                                <option value=7>আগষ্ট</option>
                                                <option value=8>সেপ্টেম্বর</option>
                                                <option value=9>অক্টোবর</option>
                                                <option value=10>নভেম্বর</option>
                                                <option value=11>ডিসেম্বর</option>
                                            </select>
                                            <select id="year" onchange="jump()"></select>       
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">বিজ্ঞাপন</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>
                        <div class="adds--widget">
                            <a href="#"> <img src="{{asset('public/img/ads-img/orginal.jpg')}} " alt="" ngh0uci4s="" data-rjs="2" /> </a>
                        </div>
                    </div>  
                </div>
            </div>
            
        </div>
        <div class="ad--space pd--30-0 text-center">
            <a href="#"> <img src="{{asset('public/img/ads-img/water.jpg')}}" alt="" class="center-block" /> </a>
        </div>
    </div>
</div> 

@endsection