$(document).ready(function(){
    function filterNewsSlide(){
        $('#filter_slide_right').click(function(){
            $('#slide_Container').css({
                'transform' : 'translateX(-55%)',
            });
           
           
        });
        $('#filter_slide_left').click(function(){
           
            $('#slide_Container').css({
                'transform' : 'translateX(0%)',
            });
          
           
        });
    }
    filterNewsSlide();
})