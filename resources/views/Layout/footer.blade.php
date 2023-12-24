<?php 
use App\Models\site_settings_model;
use App\Models\social_link_table_model;

 // FOOTER CONTROL 
$siteSettingData  =site_settings_model::where('id','=',1)->get(); 
$social_links_data  =social_link_table_model::where('id','=',1)->first(); 
$footer_logo = $siteSettingData[0]['footer_logo']; // website footer logo logo
?>

<footer class="footer--section footer-bg" >
  <div class="footer--widgets pd--30-0 bg--color-2 ">
      <div class="container">
          <div class="row ">
              <div class="col-md-3 col-xs-6 h-100 col-xxs-12 ptop--30 pbottom--30">
                  <div class="widget">
                      <div class="widget--title">
                          <img src=" {{asset('public/'.$footer_logo)}}" alt="">
                      </div>
                      <div class="about--widget al-footer-about-widget">
                           <p>ফলো করুন</p>
                           <ul class="footer-social-icons">
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
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                  <div class="widget">
                      <div class="widget--title">
                          <h2 class="h4">দরকারী তথ্য লিঙ্ক</h2>
                          <i class="icon fa fa-expand"></i>
                      </div> 
                      <div class="links--widget">
                          <ul class="nav">
                              <li><a href="/category/জাতীয়" class="fa-angle-right">জাতীয়</a></li>
                              <li><a href="/category/আন্তর্জাতিক" class="fa-angle-right">আন্তর্জাতিক</a></li>
                              <li><a href="/category/রাজনীতি" class="fa-angle-right">রাজনীতি</a></li>
                              <li><a href="/category/অর্থনীতি" class="fa-angle-right">অর্থনীতি</a></li>
                              <li><a href="/category/সারাদেশ" class="fa-angle-right">সারাদেশ</a></li>
                              <li><a href="/category/খেলাধুলা" class="fa-angle-right">খেলাধুলা</a></li>
                              <li><a href="/category/বিনোদন" class="fa-angle-right">বিনোদন</a></li> 
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                  <div class="widget">
                      <div class="widget--title">
                          <h2 class="h4">বিজ্ঞাপন</h2>
                          <i class="icon fa fa-bullhorn"></i>
                      </div>
                      <div class="links--widget">
                          <ul class="nav"> 
                              <li><a href="/category/শিক্ষাঙ্গন" class="fa-angle-right">শিক্ষাঙ্গন</a></li>
                              <li><a href="/category/লাইফ-স্টাইল" class="fa-angle-right">লাইফ স্টাইল</a></li>
                              <li><a href="/category/আইটি-বিশ্ব" class="fa-angle-right">আইটি বিশ্ব</a></li>
                              <li><a href="/category/পরবাস" class="fa-angle-right">পরবাস</a></li>
                              <li><a href="/category/ইসলাম-ও-জীবন" class="fa-angle-right">ইসলাম ও জীবন</a></li>
                              <li><a href="/category/রাজধানী" class="fa-angle-right">রাজধানী</a></li>
                              <li><a href="/category/ডাক্তার-আছেন" class="fa-angle-right">ডাক্তার আছেন</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                  <div class="widget">
                      <div class="widget--title">
                          <h2 class="h4">কর্মজীবন</h2>
                          <i class="icon fa-solid fa-user"></i>
                      </div>
                      <div class="links--widget">
                          <ul class="nav"> 
                              <li><a href="/category/চিত্র-বিচিত্র" class="fa-angle-right">চিত্র বিচিত্র</a></li>
                              <li><a href="/category/একদিন-প্রতিদিন" class="fa-angle-right">একদিন প্রতিদিন</a></li>
                              <li><a href="/category/সম্পাদকীয়" class="fa-angle-right">সম্পাদকীয়</a></li>
                              <li><a href="/category/দৃষ্টিপাত" class="fa-angle-right">দৃষ্টিপাত</a></li>
                              <li><a href="/category/বাতায়ন" class="fa-angle-right">বাতায়ন</a></li>
                              <li><a href="/category/স্বজন" class="fa-angle-right">স্বজন</a></li>
                              <li><a href="/category/সমাবেশ" class="fa-angle-right">সমাবেশ</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <hr class="footer-hr">
          <div class="row">
              <div class="col-md-12 pt-2 pb-2 text-center">
                  <p>© আমিন আইটি খবর  ২০০৫ - ২০২২ <br>

                      ভারপ্রাপ্ত সম্পাদক : খন্দকার মুনীরুজ্জামান । প্রকাশক : আবুল কালাম মোহাম্মদ যাকারিয়া<br>
                      
                      আমিন আইটি ভবন (২য় তলা) | নিকুঞ্জ ২, খিলক্ষেত , ঢাকা - ১২২৯ । ফোন : +৮৮০ ১৮৮৮০৭১০০০ <br>
                      
                      বিজ্ঞাপন : +৮৮০ ১৮৮৮০৭১০০০ | ই-মেইল: info@aminitltd.com
                  </p>
              </div>
          </div>
      </div>
  </div>
  <div class="footer--copyright bg--color-3">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-6 text-center-991">
                  <p>&copy; 2022. All rights reserved - Design and developed by  <a href="https://aminitltd.com/">AMIN IT LTD</a></p>
              </div>
              <div class="col-md-6 text-right text-center-991">
                  <p> | Proudly hosted by<a target="_blank" href="https://www.hostholder.com/"> Host Holder</a></p>
              </div>
          </div> 
      </div>
  </div>
</footer>
</div> 
<div id="backToTop">
<a href="#"><i class="fa fa-angle-double-up"></i></a>
</div>