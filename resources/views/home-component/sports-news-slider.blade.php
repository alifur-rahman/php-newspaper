{{-- Home Slider Style 2--}}

<?php 
use App\Models\post_table_model;
$todayDate = date("Y-m-d");
// world news category post data 
$dataArray = post_table_model::where('lang','=','bn')->where('catagories','=','খেলাধুলা')->where('status','=','Publish')->where('public_date','=',$todayDate)->orderBy('id', 'desc')->get();



?>
@if(isset($dataArray))
<div class="col-md-6 ptop--30 ">
    <div class="post--items-title" data-ajax="tab">
        <h2 class="h4">খেলাধুলা</h2>
        <div class="nav">
            <!-- <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts"> <i class="fa fa-long-arrow-left"></i> </a>  -->
            <span class="divider">/</span> 
            <a href="#" style="opacity:0;" class="next btn-link" > <i class="fa fa-long-arrow-right"></i> </a>
        </div>
    </div>
    <div class="carusel-item-design post--items post--items-3 items-carousel owl-carousel owl-theme" data-ajax-content="outer" >
       
        <?php 
            $array_count = count($dataArray);
            $maxItem = 5;
            $st = 0;
            $en = 5;
            $coun = 0;
            $condi = 0;
            $from = floor($array_count/$maxItem)
        ?>

        @if ($array_count<$maxItem )
            <ul class="nav" >
                @foreach ($dataArray->slice($st, $en) as $item )
                    @if ($coun == $condi)
                        <li>
                            <div class="post--item post--layout-1">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a> <a href="/category/{{str_replace(' ', '-', $item->catagories)}}" class="cat">{{$item->catagories}}</a>
                                    <a href="#" class="icon"><i class="fa fa-heart"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">নিজস্ব প্রতিবেদক </a></li>
                                            <li><a href="#">{{ EntoBnDate(date( "d-M-Y", strtotime($item->public_date) ))}}</a></li>
                                        </ul>
                                        <div class="title">
                                            <h3 class="h4"><a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="btn-link">{{$item->post_title}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
                            $condi = $condi+$en;
                        ?>
                    @else
                        <li>
                            <div class="post--item post--layout-3">
                                <div class="post--img">
                                    <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
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
                    @endif    
                    <?php 
                        $coun++
                    ?>
                @endforeach 
                <?php 
                    $st = $en+1;
                    // $en = $en+5;
                ?>
            </ul> 
        @else
            @for ($i = 0; $i <=$from ; $i++)
                <ul class="nav" >
                    @foreach ($dataArray->slice($st, $en) as $item )
                        @if ($coun == $condi)
                            <li>
                                <div class="post--item post--layout-1">
                                    <div class="post--img">
                                        <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a> <a href="/category/{{str_replace(' ', '-', $item->catagories)}}" class="cat">{{$item->catagories}}</a>
                                        <a href="#" class="icon"><i class="fa fa-heart"></i></a>
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
                            <?php 
                                $condi = $condi+$en;
                            ?>
                        @else
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="/single/{{base64_encode($item->id)}}/{{str_replace(' ', '-', $item->post_title)}}" class="thumb"><img src="{{asset('public/'.$item->post_thumbnail)}}" alt="" /></a>
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
                        @endif    
                        <?php 
                            $coun++
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






