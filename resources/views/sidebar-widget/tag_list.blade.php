<?php 
    use App\Models\post_table_model;
    $array = post_table_model::select('post_tags')->where('lang','=','bn')->orderBy('id', 'desc')->get();
?>
{{-- {{$array}} --}}
<div class="widget">
    <div class="widget--title">
        <h2 class="h4">ট্যাগ</h2>
        <i class="icon fa fa-tags"></i>
    </div>
    <div class="tags--widget style--1">
        <ul class="nav">
            {{-- @foreach( $array as $info) 
                <?php 
                    $old_item = "";
                ?>
                @foreach(explode(',', $info->post_tags) as $info) 
                    @if ($old_item != $info)
                        <li><a href="#">{{$info}}</a></li>
                        <?php 
                            $old_item = $info;
                        ?>
                    @endif
                @endforeach
            @endforeach --}}

            
            <li><a href="/tag/সংবাদ">সংবাদ</a></li>
            <li><a href="/tag/চিত্র">চিত্র</a></li>৷
            <li><a href="/tag/সংগীত">সংগীত</a></li>৷
            <li><a href="/tag/ভিডিও">ভিডিও</a></li>৷
            <li><a href="/tag/অডিও">অডিও</a></li>
            <li><a href="/tag/ফ্যাশন">ফ্যাশন</a></li>
            <li><a href="/tag/সর্বশেষ">সর্বশেষ</a></li>
            <li><a href="/tag/চলমান">চলমান</a></li>
            <li><a href="/tag/বিশেষ">বিশেষ</a></li>
            <li><a href="/tag/রেসিপি">রেসিপি</a></li>
            <li><a href="/tag/ক্রীড়া">ক্রীড়া</a></li>
        </ul>
    </div>
</div>