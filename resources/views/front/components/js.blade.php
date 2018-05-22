<!-- ■IE9以下のHTML5とcss3対策 -->
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('js/html5shiv.js')}}"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!-- ■JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/jquery.matchHeight.js')}}"></script>
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


</script>