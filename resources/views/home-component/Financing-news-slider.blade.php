
{{-- Home Slider Style 3--}}

<?php 
use App\Models\post_table_model;
$todayDate = date("Y-m-d");
// world news category post data 
$dataArray = post_table_model::where('lang','=','bn')->where('catagories','=','অর্থায়ন')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('id', 'desc')->get();



?>
@if(isset($dataArray))
    <div class="col-md-12 ptop--30 ">
        <div class="post--items-title" data-ajax="tab">
            <h2 class="h4">অর্থায়ন</h2>
            <div class="nav">
                <!-- <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts"> <i class="fa fa-long-arrow-left"></i> </a>  -->
                <span class="divider">/</span> 
                <a href="#" style="opacity:0;" class="next btn-link" > <i class="fa fa-long-arrow-right"></i> </a>
            </div>
        </div>
        <div class="post--items post--items-2 items-carousel owl-carousel owl-theme al-item-mb" >

            <?php 
                $array_count = count($dataArray);
                $maxItem = 5;
                $st = 0;
                $en = 5;
                $coun = 0;
                $condi = 0;
                $from = floor($array_count/$maxItem);
            ?>
            @if ($array_count<$maxItem)
            <ul class="nav row">
                <?php $subDivCount = 0; ?>
                @foreach ($dataArray->slice($st, $en) as $item )
                    @if ($coun == $condi)
                        <li class="col-md-6">
                            <div class="post--item post--layout-2">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}} " alt="" /></a> <a href="/category/{{str_replace(' ', '-', $item->catagories)}}" class="cat">{{$item->catagories}}</a>
                                    <a href="#" class="icon"><i class="fa-solid fa-star"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4">
                                                <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">
                                                    {{$item->post_title}}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
                            $condi = $condi+$en;
                        ?>
                    @else
                        @if ($subDivCount == 0 )
                            <li class="col-md-6">
                                <li class="col-md-3">
                                    <ul class="nav row">
                                        <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                        <li class="col-xs-12">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img">
                                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src=" {{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                        @else
                            <li class="col-md-3">
                                <ul class="nav row">
                                    <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                    <li class="col-xs-12">
                                        <div class="post--item post--layout-2">
                                            <div class="post--img">
                                                <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src=" {{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                        <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if ($subDivCount == 2 )
                            </li>
                        @endif
                    @endif    
                    <?php 
                        $coun++;
                        if($subDivCount == 2){
                            $subDivCount = 0;
                        }
                        else{
                            $subDivCount++;
                        }
                    ?>
                @endforeach 
                <?php 
                    $st = $en+1;
                    // $en = $en+5;
                ?>
            </ul> 
        @else  
        
            @for ($i = 0; $i <=$from ; $i++)
            <ul class="nav row">
                <?php $subDivCount = 0; ?>
                    @foreach ($dataArray->slice($st, $en) as $item )
                        @if ($coun == $condi)
                            <li class="col-md-6">
                                <div class="post--item post--layout-2">
                                    <div class="post--img">
                                        <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}} " alt="" /></a> <a href="/category/{{str_replace(' ', '-', $item->catagories)}}" class="cat">{{$item->catagories}}</a>
                                        <a href="#" class="icon"><i class="fa-solid fa-star"></i></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                            </ul>
                                            <div class="title">
                                                <h3 class="h4">
                                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">
                                                        {{$item->post_title}}
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="short-description">
                                                <p style="color:black; font-size:15px">{{ $item->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php 
                                $condi = $condi+$en;
                            ?>
                        @else
                            @if ($subDivCount == 0 )
                                <li class="col-md-6">
                                    <li class="col-md-3">
                                        <ul class="nav row">
                                            <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                            <li class="col-xs-12">
                                                <div class="post--item post--layout-2">
                                                    <div class="post--img">
                                                        <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src=" {{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                                <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                                            </ul>
                                                            <div class="title">
                                                                <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                            @else
                                <li class="col-md-3">
                                    <ul class="nav row">
                                        <li class="col-xs-12 hidden-md hidden-lg"><hr class="divider" /></li>
                                        <li class="col-xs-12">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img">
                                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src=" {{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">নিজস্ব প্রতিবেদক</a></li>
                                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                           
                            @if ($subDivCount == 2 )
                                </li>
                            @endif
                        @endif    
                        <?php 
                            $coun++;
                            if($subDivCount == 2){
                                $subDivCount = 0;
                            }
                            else{
                                $subDivCount++;
                            }
                            
                        ?>
                    @endforeach 
                    <?php 
                        $st = $en+1;
                        // $en = $en+5;
                    ?>   
            </ul> 
            @endfor
        
        @endif

            


                


            
        
            
        </div>
    </div>
@endif