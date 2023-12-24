
@extends('Layout.app')
@section('title', 'E-Paper')
@section('content')
<?php
  function EntoBnDate($enData){
        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");

        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 

        // convert all bangle char to English char 
        $bnDate = str_replace($search_array, $replace_array, $enData);  
        // $end_date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $en_number); 
        return $bnDate;
    }
?>

<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row" style="transform: none;">
            <div class="main--sidebar  col-md-2 col-sm-2 col-12 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"> 
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4 al-Epaper-date-show" > {{ EntoBnDate(date( "d-M-Y", strtotime($ePaperData[0]['publish_at']) ))  }} </h2>
                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>

                        </div>
                        <div class="nav--widget nav-bg">
                            <div class="d-flex align-items-start">
                                <div class="custom-nav-pils nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <div class="default-tab-button">
                                        @for ($i = 0; $i < count($ePaperData); $i++)
                                            @if ($i == 0)
                                                <button class="nav-link al-pils-btn  active" data-targetClass="target-{{ $i }}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""><p>{{ $ePaperData[$i]['title'] }}</p></button>
                                            @else
                                                <button class="nav-link al-pils-btn"  data-targetClass="target-{{ $i }}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""><p>{{ $ePaperData[$i]['title'] }}</p></button>
                                            @endif
                                        
                                        @endfor
                                    </div>
                                   

                                       
                                </div>

                            </div>
                        </div>
                    </div> 
                    {{-- <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">বিজ্ঞাপন</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>
                        <div class="adds--widget">
                            <a href="#"> <img src="{{asset('public/img/ads-img/orginal.jpg')}}" alt="" ngh0uci4s="" data-rjs="2" /> </a>
                        </div>
                    </div>   --}}
                </div>
            </div>


            <div class="main--content al-col-1200 col-md-8 col-sm-8 col-12" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="post--items post--items-5 pd--30-0">
                        <div class="tab-content magnafiq-parent-container" id="v-pills-tabContent">

                            <div class="defalut-image-show">
                                @for ($i = 0; $i < count($ePaperData); $i++)
                                    @if ($i == 0)
                                        <div data-targetClass="target-{{ $i }}" class=" al-show-image active" >
                                            <a href="{{asset('public/'.$ePaperData[$i]['image'])}}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""></a>
                                        </div>

                                    @else
                                        <div data-targetClass="target-{{ $i }}" class=" al-show-image">
                                            <a href="{{asset('public/'.$ePaperData[$i]['image'])}}"><img src="{{asset('public/'.$ePaperData[$i]['image'])}}" alt=""></a>
                                        </div>
                                    @endif
                                
                                @endfor 
                            </div>


                        </div>
                    </div>
                    <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30 text-center"> 
                        <ul class="pagination text-center">
                            <li>
                                <a class="al-pils-btn no-focus" href="#" data-targetClass="target-0">প্রথম পাতা </a> 
                            </li> 
                            <li>
                            <div class="pagination--wrapper clearfix bdtop--1 bd--color-2"> 
                                    <ul class="pagination float--right al-pils-pagination">
                                        @for ($i = 0; $i < count($ePaperData); $i++)
                                            @if ($i == 0)
                                                <li ><a class="active al-pils-btn pagin" data-targetClass="target-{{ $i }}" href="#">{{ $i+1 }}</a></li>
                                            @else
                                                <li ><a class=" al-pils-btn pagin" data-targetClass="target-{{ $i }}" href="#" >{{ $i+1 }}</a></li>
                                            @endif
                                           
                                        @endfor
                                       
                                       
                                    </ul>
                                </div>
                            </li>
                            <li id="al-pills-pagi">
                                <a class="al-pils-btn no-focus" href="#" data-targetClass="target-{{ $i-1 }}">শেষ পাতা </a> 
                            </li> 
                        </ul>
                    </div> 
                </div>
            </div>

            <div class="main--sidebar al-fixed-1200 col-md-2 col-sm-4 ptop--30 pbottom--30" data-sticky-content="true" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"> 
                    <div class="widget">
                        <div class="widget--title al-calender">
                            <h2 class="h4">ক্যালেন্ডার </h2>
                            <div class="al-calender-close-icon al-close-calender">
                                <span> <img src="{{ asset('public/ePaper/close.svg') }}" alt="" srcset=""> </span>
                            </div>
                        </div>
                        <div class="nav--widget nav-bg"> 
                            <div class="celender">
                                <div class="wrapper"> 
                                    <div class="container-calendar">
                                        
                                        <div id="aldatepicker"></div>

                                        <input type="hidden" id="aldatepicker2" disabled>
                                        
                                       
                                        
                                        <div class="footer-container-calendar"> 
                                            <div class="widget--title">
                                                <h2 class="h4 al-Epaper-date-show" > {{ EntoBnDate(date( "d-M-Y", strtotime($ePaperData[0]['publish_at']) ))  }} </h2>
                                                <p>যেকনো তারিখের ই-পেপার পড়তে ক্যালেন্ডারের তারিখ এ ক্লিক করুন</p>
                    
                                            </div>
                                            {{-- <select id="month" onchange="jump()"> 
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
                                            <select id="year" onchange="jump()"></select>        --}}
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                    {{-- <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">বিজ্ঞাপন</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>
                        <div class="adds--widget">
                            <a href="#"> <img src="{{asset('public/img/ads-img/orginal.jpg')}} " alt="" ngh0uci4s="" data-rjs="2" /> </a>
                        </div>
                    </div>   --}}
                </div>
            </div>

            <div class="al-calender-icon al-opren-calender">
                <span> <img src="{{ asset('public/ePaper/filter-calendar.svg') }}" alt="" srcset=""> </span>
            </div>
            
        </div>
        {{-- <div class="ad--space pd--30-0 text-center">
            <a href="#"> <img src="{{asset('public/img/ads-img/water.jpg')}}" alt="" class="center-block" /> </a>
        </div> --}}
    </div>
</div> 

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // show calender 
            $('.al-opren-calender').click(function(){
                $('.al-fixed-1200').css({
                    'right' : '0'
                });
            });
            $('.al-close-calender').click(function(){
                $('.al-fixed-1200').css({
                    'right' : '-100%'
                });
            });

            // dynamic pills 
           function pilsBtnClick(){
                $('.al-pils-btn').click(function(e){
                    $('.al-pils-btn').removeClass('active');
                    $('.al-show-image').removeClass('active');
                    var targetClass = $(this).attr("data-targetClass");
                    $("[data-targetClass="+targetClass+"]").addClass('active');
                    return false;
                });
           }
           pilsBtnClick();

            // magnificPopup 
            $('.magnafiq-parent-container').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                // other options
                zoom: {
                enabled: true, // By default it's false, so don't forget to enable it
            
                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function
                },
                gallery:{
                enabled:true
                }
            });

            // datepiker 
            
            $('#aldatepicker').datepicker({
                onSelect: function(dateText) {
                    $('#aldatepicker2').datepicker("setDate", $(this).datepicker("getDate"));
                    // console.log($('#aldatepicker2').val());
                    getEpaperDataByData($('#aldatepicker2').val());
                }
            });
            $("#aldatepicker2").datepicker();

            function getEpaperDataByData(date){
                // console.log(date)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url: "{{ url('/ePaper/getDataByDate') }}",
                    data: {
                        date: date
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.ePaperData.length == 0){
                            $.toast({
                                heading: 'Info',
                                text: 'এই তারিখের ই-পেপার  পোস্ট করা হয়নি। '+date+'',
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info'
                            });
                        }
                        else{
                            
                            var ShowImage = "";
                            var showTab = "";
                            var showPagiBtn = "";
                            var lastPageBtn = "";
                            var hostOrigine = window.location.origin+'/public/';
                            for (let index = 0; index < res.ePaperData.length; index++) {
                                var indexPlus = index+1;
                                if(index == 0){
                                    
                                    ShowImage += '<div data-targetClass="target-'+index+'" class="al-show-image active" ><a href="'+hostOrigine+res.ePaperData[index].image+'"><img src="'+hostOrigine+res.ePaperData[index].image+'" alt=""></a></div>';
                                    showTab += '<button class="nav-link al-pils-btn  active" data-targetClass="target-'+index+'"><img src="'+hostOrigine+res.ePaperData[index].image+'" alt=""><p>'+res.ePaperData[index].title+'</p></button>';
                                    showPagiBtn += '<li ><a class="active al-pils-btn pagin" data-targetClass="target-'+index+'" href="#">'+indexPlus+'</a></li>';
                                }
                                else{
                                    ShowImage += '<div data-targetClass="target-'+index+'" class="al-show-image" ><a href="'+hostOrigine+res.ePaperData[index].image+'"><img src="'+hostOrigine+res.ePaperData[index].image+'" alt=""></a></div>';
                                    showTab += '<button class="nav-link al-pils-btn " data-targetClass="target-'+index+'"><img src="'+hostOrigine+res.ePaperData[index].image+'" alt=""><p>'+res.ePaperData[index].title+'</p></button>';
                                    showPagiBtn += '<li ><a class=" al-pils-btn pagin" data-targetClass="target-'+index+'" href="#">'+indexPlus+'</a></li>';
                                    
                                }
                                
                            }
                            lastPageBtn = res.ePaperData.length-1;
                            lastPageBtn = '<a class="al-pils-btn no-focus" href="#" data-targetClass="target-'+lastPageBtn+'">শেষ পাতা </a>' ;
                            $('.defalut-image-show').html(ShowImage);
                            $('.default-tab-button').html(showTab);
                            $('.al-pils-pagination').html(showPagiBtn);
                            $('#al-pills-pagi').html(lastPageBtn);
                            $('.al-Epaper-date-show').html(res.sedate);

                            pilsBtnClick();
                           
                        }
                        
                        // Object.keys(data.shareInfo[i]).length

                    }
                });
            }
        });
    </script>
@endsection
{{-- 
<div data-targetClass="target-" class="al-show-image active" >
    <a href=""><img src="" alt=""></a>
</div> --}}
{{-- <button class="nav-link al-pils-btn  active" data-targetClass="target-"><img src="" alt=""><p></p></button> --}}
<li ><a class="active al-pils-btn pagin" data-targetClass="target-" href="#"></a></li>