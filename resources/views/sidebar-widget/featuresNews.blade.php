<?php 
    use App\Models\post_table_model;
    $hotNewsArray = post_table_model::where('lang','=','bn')->where('hot_news','=',1)->orderBy('id', 'desc')->take(4)->get();
    $new_trendsArray = post_table_model::where('lang','=','bn')->where('new_trends','=',1)->orderBy('id', 'desc')->take(4)->get();
    $featured_newsArray = post_table_model::where('lang','=','bn')->where('featured_news','=',1)->orderBy('id', 'desc')->take(4)->get();
    $most_popularArray = post_table_model::where('lang','=','bn')->where('most_popular','=',1)->orderBy('id', 'desc')->take(4)->get();
    $most_view_Array = post_table_model::where('lang','=','bn')->orderBy('view', 'desc')->take(4)->get();
?>

<div class="widget al-sidebar-news-filter">
    <div class="widget--title">
        <h2 class="h4">ফিল্টার সংবাদ </h2>
        <i class="icon fa fa-newspaper-o"></i>
    </div>


     
    <div class="list--widget list--widget-1 ">
        <div class="list--widget-nav" data-ajax="tab">
            <i class="fa-solid fa-circle-chevron-left filter_slide_btn" id="filter_slide_left"></i>

            <div class="slider" >
                <ul id="slide_Container" class="nav nav-justified ">
                    <li class="active"><a data-toggle="tab" href="#hot_news">গরম সংবাদ</a></li>
                    <li><a data-toggle="tab" href="#trendy_news">ট্রেন্ডি নিউজ</a></li>
                    <li><a data-toggle="tab" href="#most_news">সবচেয়ে বেশি দেখা</a></li>
                    <li><a data-toggle="tab" href="#featured_news">আলোচিত সংবাদ</a></li>
                    <li><a data-toggle="tab" href="#most_popular">সবচেয়ে জনপ্রিয়</a></li>
                </ul>
            </div>
            <i id="filter_slide_right" class="fa-solid fa-circle-chevron-right filter_slide_btn"></i>

        </div>
        
        <div class="tab-content">
            <div id="hot_news" class="tab-pane fade in active">
                <ul>

                    @foreach ($hotNewsArray as $item)
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>৷
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="trendy_news" class="tab-pane fade">
                <ul>
                    @foreach ($new_trendsArray as $item)
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>৷
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="most_news" class="tab-pane fade">
                <ul>
                    @foreach ($most_view_Array as $item)
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>৷
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="featured_news" class="tab-pane fade">
                <ul>
                    @foreach ($featured_newsArray as $item)
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>৷
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="most_popular" class="tab-pane fade">
                <ul>
                    @foreach ($most_popularArray as $item)
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>৷
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>  
    </div>
</div>