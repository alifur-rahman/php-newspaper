<?php 
    use App\Models\category_table_model;
    use App\Models\site_settings_model;
    use App\Models\post_table_model;
    use App\Models\social_link_table_model;
    use App\Models\ads_table_model;
    
    $todayDate = date("Y-m-d");
    $categoryMenu = category_table_model::where('lang','=','bn')->where('status','=','Published')->get(); // all data of category table
    $siteSettingData  =site_settings_model::where('id','=',1)->get(); // first index all data off site Setting table
   
    $website_logo = $siteSettingData[0]['website_logo']; // website logo
    $headlinetitleData = post_table_model::where('lang','=','bn')->where('headline','=',1)->where('status','=','Publish')->where('public_date','=',$todayDate)->get();
    $social_links_data  =social_link_table_model::where('id','=',1)->first(); 

    // ads 
    $headerAds1 = ads_table_model::where('position_id','=','HDP1')->where('expair_at','>=',$todayDate)->get();

   $outerUserID = Session::get('outerUserID');

   function EnToBnWeakName($enWeakend){
        $replace_array= array("শনিবার", "রবিবার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার",":", ",");

        $search_array= array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",":", ","); 

        // convert all bangle char to English char 
        $bnWeakend = str_replace($search_array, $replace_array, $enWeakend);  
        // $end_date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $en_number); 
        return $bnWeakend;
    }
    function EntoBnDateforH($enData){
        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");

        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 

        // convert all bangle char to English char 
        $bnDate = str_replace($search_array, $replace_array, $enData);  
        // $end_date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $en_number); 
        return $bnDate;
    }


?>
<div id="preloader">
  <div class="preloader bg--color-1--b" data-preloader="1"><div class="preloader--inner"></div></div>
</div>
<div class="wrapper">
  <header class="header--section header--style-1">
      <div class="header--topbar bg--color-2">
          <div class="container">
              <div class="float--left float--xs-none text-xs-center">
                  <ul class="header--topbar-info nav">
                      <li><i class="fa fm fa-map-marker"></i>বাংলাদেশ  </li>
                      <li><i class="fa fm fa-calendar"></i>আজ (<p style="display:inline-block">{{ EnToBnWeakName(date("l")) }} <span>{{ EntoBnDateforH(date("d-F-Y"))}}</span>ইং  </p>)</li>
                      <li><i class="fa fm fa-calendar"></i>আজ (<p style="display:inline-block" class="bongabdo"></p>) </li>
                  </ul>
              </div>
              <div class="float--right float--xs-none text-xs-center">
                @if (isset($outerUserID))
                    <ul class="header--topbar-lang nav" style="border:none">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa-solid fa-user"></i>  Profile<i class="fa flm fa-angle-down"></i></a>
                            <ul class="dropdown-menu"> 
                                <li><a href="/user/home" >Dashboard</a></li> 
                                <li><a href="/user/logout" id="google_translate_elemen">Logout</a></li>
                            </ul> 
                        </li>
                    </ul>
                @else
                    <ul class="header--topbar-action nav">
                        <li>
                            <a href="/user/auth"><i class="fa fm fa-user-o"></i>লগইন/রেজিস্টার করুন</a>
                        </li>
                    </ul>
                @endif

                 
                 

                  <ul class="header--topbar-lang nav">
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fm fa-language"></i>বাংলা<i class="fa flm fa-angle-down"></i></a>
                          <ul class="dropdown-menu"> 
                              <li><a href="#" onclick="return false;">বাংলা</a></li> 
                              <li><a href="/en" id="google_translate_elemen">ইংরেজি</a></li>
                          </ul> 
                      </li>
                  </ul>
                  <ul class="header--topbar-social nav hidden-sm hidden-xxs">
            
                    @if ($social_links_data->facebook != null)
                    <li>
                        <a href="{{$social_links_data->facebook}} "><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    @endif
                     @if ($social_links_data->twitter != null)
                     <li>
                        <a href="{{$social_links_data->twitter}}"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                     @endif
                      
                      @if ($social_links_data->linkedin != null)
                      <li>
                        <a href="{{$social_links_data->linkedin}}"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                      @endif
                     
                      @if ($social_links_data->printerest != null)
                      <li>
                        <a href="{{$social_links_data->printerest}}"><i class="fa-brands fa-pinterest-square"></i></a>
                        </li>
                      @endif

                      @if ( $social_links_data->vimemo != null)
                      <li>
                        <a href="{{$social_links_data->vimemo}}"><i class="fa-brands fa-vimeo-square"></i></a>
                        </li>
                      @endif

                      @if ($social_links_data->youtube != null)
                      <li>
                        <a href="{{$social_links_data->youtube}}"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                      @endif
          
                  </ul>
              </div>
          </div>
      </div>
      <div class="header--mainbar">
          <div class="container">
              <div class="header--logo float--left float--sm-none text-sm-center">
                  <h1 class="h1">
                      <a href="/" class="btn-link"> <img src="{{asset('public/'.$website_logo)}}" alt="" /> <span class="hidden">Amin IT news Logo</span> </a>
                  </h1>
              </div>
              {{-- header ads position 1  --}}
              @if (isset($headerAds1))
                <div class="Al_ads_area ads-728x80">
                @foreach ($headerAds1 as $item)
                    @if ($item->ads_type == "image")
                        <div class="header--ad float--right float--sm-none al-ads-item header-ads-al">
                            <a target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Header Advertisement" /> </a>
                        </div>
                    @elseif($item->ads_type == "google")
                    <div class="header--ad float--right float--sm-none  al-ads-item header-ads-al">
                        <p>Can't passible show google ads in demo</p>
                    </div>
                    @elseif($item->ads_type == "script")
                    <div class="header--ad float--right float--sm-none  al-ads-item header-ads-al">
                    {!!$item->script!!}
                    </div>
                    @endif
                @endforeach
                </div>
              @endif
              
          </div>
      </div>
      <div class="header--navbar navbar bd--color-1 bg--color-1" data-trigger="sticky">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                      <span class="sr-only">টগল নেভিগেশন </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed" id="desk_bars" data-toggle="collapse" data-target="#headerNav2" aria-controls="headerNav2"  aria-expanded="false">
                      <span class="sr-only">টগল নেভিগেশন </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                  </button>
              </div>
              <div id="headerNav" class="navbar-collapse collapse float--left"> 
                  <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                      <li class="dropdown">
                          <a href="/" class="" >হোম {{--<i class="fa flm fa-angle-down"></i> --}}</a>
                          {{-- <ul class="dropdown-menu" style="">
                              <li><a href="index2.php">হোম 2</a></li> 
                              <li><a href="index3.php">হোম 3</a></li> 
                          </ul> --}}
                      </li>
                      <li><a href="/category/কোভিড-১৯">কোভিড-১৯</a></li> 
                      <li><a href="/category/জাতীয়">জাতীয়</a></li>
                      <li><a href="/category/রাজনীতি">রাজনীতি</a></li>
                      <li><a href="/category/অর্থনীতি">অর্থনীতি</a></li>
                      <li><a href="/category/আন্তর্জাতিক">আন্তর্জাতিক</a></li>
                      <li><a href="/category/সারাদেশ">সারাদেশ</a></li>
                      <li><a href="/category/খেলাধুলা">খেলাধুলা</a></li> 
                      <li><a href="/category/বিনোদন">বিনোদন</a></li> 
                      <li> <a href="/ePaper/subscribe">ইপেপার </a></li> 
                  </ul>
              </div>
              <div id="headerNav2" class="navbar-collapse collapse float--left"> 
                  <a href="#" id="sec_menu_close"><i class="fa-solid fa-xmark"></i></a>
                  <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                      <li class="headerNav2_logo"><a href="/"><img src=" {{$website_logo}}" alt=""></a></li>

                      @foreach ($categoryMenu as $categoryMenu)
                        <li><a href="/category/{{str_replace(' ', '-', $categoryMenu->Name)}}">{{$categoryMenu->Name}}</a></li>
                      @endforeach
                     
                     
                  </ul>
              </div>
              <div class="header--search-form float--right" > 
                  <input type="search" id="search" name="search" placeholder="অনুসন্ধান করুন..." class="header--search-control form-control" required />
                  <button  type="submit" onclick="onSearch()" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                 
              </div>
          </div>
      </div>
  </header>
  {{-- <div class="posts--filter-bar style--1 hidden-xs">
      <div class="container">
          <ul class="nav">
              <li>
                  <a href="/filter/featured_news"> <i class="fa-solid fa-star"></i> <span>আলোচিত সংবাদ</span> </a>
              </li>
              <li>
                  <a href="/filter/most_popular"> <i class="fa-solid fa-heart"></i> <span>সবচেয়ে জনপ্রিয়</span> </a>
              </li>
              <li>
                  <a href="/filter/hot_news"> <i class="fa fa-fire"></i> <span>গরম খবর</span> </a>
              </li>
              <li>
                  <a href="/filter/new_trends"> <i class="fa-solid fa-bolt"></i> <span>নতুন প্রবণতা</span> </a>
              </li>
              <li>
                  <a href="/filter/view"> <i class="fa fa-eye"></i> <span>সর্বাধিক দেখা</span> </a>
              </li> 
          </ul> 
      </div>
  </div> --}}
  <div class="news--ticker g-0"> 
      <div class="title">
          <h2>সংবাদ আপডেট </h2>
          {{-- <span>(12 মিনিট আগে আপডেট)</span> --}}
      </div>
      <div class="news-updates--list" data-marquee="true">
          <ul class="nav">
            @foreach ($headlinetitleData as $item)
              <li>
                  <h3 class="h3"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}"> {{$item->post_title}} |</a></h3>
              </li>
            @endforeach
          </ul>
      </div> 
  </div>