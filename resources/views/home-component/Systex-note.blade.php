{{-- start foreach in 2 design layout for home page slider  --}}
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
    <parent>
        @foreach ($dataArray->slice($st, $en) as $item )
            @if ($coun == $condi)
                <child></child>
                <?php 
                    $condi = $condi+$en;
                ?>
            @else
                <child></child>
            @endif    
            <?php 
                $coun++
            ?>
        @endforeach 
        <?php 
            $st = $en+1;
            // $en = $en+5;
        ?>
    </parent>
@else  

    @for ($i = 0; $i <=$from ; $i++)
        <parent>
            @foreach ($dataArray->slice($st, $en) as $item )
                @if ($coun == $condi)
                    <child></child>
                    <?php 
                        $condi = $condi+$en;
                    ?>
                @else
                    <child></child>
                @endif    
                <?php 
                    $coun++
                ?>
            @endforeach 
            <?php 
                $st = $en+1;
                // $en = $en+5;
            ?>
        </parent>
    @endfor

@endif

{{-- END  --}}

