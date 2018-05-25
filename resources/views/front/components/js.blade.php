<!-- ■IE9以下のHTML5とcss3対策 -->
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('js/html5shiv.js')}}"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!-- ■JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.matchHeight.js')}}"></script>
<script src="{{asset('js/jquery.bxslider.js')}}"></script>

<script>
    /*match height
    -------------------------*/
    $(function () {
        $('.item_list li').matchHeight();
    });

    /*click
    -------------------------*/
    $(function () {
        $('.left .thumbimg li').click(function () {
            var class_name = $(this).attr("class");
            var num = class_name.slice(5);
            $('.left .itemimg li').hide();
            $('.left .item' + num).fadeIn();
        });
    });

    /* gallery
       -------------------------*/
    $(function() {

        // サムネイルの作成
        var insert = '';
        for (var i = 0; i < $('#gallery li').length; i++) {
            insert += '<a data-slide-index="' + i + '" href="#"><img src="' + $('#gallery li').eq(i).children('img').attr('src') + '"' + ' /></a>';
        };
        $('.custom-thumb').append(insert);

        $('#gallery').bxSlider({
            pagerCustom: '.custom-thumb',
            nextSelector: "#feed-next-btn",
            prevSelector: "#feed-prev-btn",
        });
    });

    /*accordion
     -------------------------*/
    (function($) {
        $(function() {
            var accordion = $(".accordion");
            accordion.each(function () {
                var noTargetAccordion = $(this).siblings(accordion);
                $(this).find(".question").click(function() {
                    $(this).next(".answer").slideToggle();
                    $(this).toggleClass("open");
                    $(this).toggleClass("active");
                    noTargetAccordion.find(".answer").slideUp();
                    noTargetAccordion.find(".question").removeClass("open");
                });
            });
        });
    })(jQuery);


</script>