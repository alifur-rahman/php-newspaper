@if (isset($homeAds1))
<div class="Al_ads_area">
    @foreach ($homeAds1 as $item)
        @if ($item->ads_type == "image")
            <div class="header--ad float--right float--sm-none hidden-xs al-ads-item header-ads-al">
                <a target="_blank" href="{{$item->URL}}"> <img src="{{asset('public/'.$item->image)}}" alt="Header Advertisement" /> </a>
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