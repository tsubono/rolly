<!-- ■IE9以下のHTML5とcss3対策 -->
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('js/html5shiv.js')}}"></script>

<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!-- ■JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>

<script type="text/javascript" src="{{asset('js/jquery.bxslider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/marquee.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.matchHeight.js')}}"></script>

<script>
    /*match height
    -------------------------*/
    $(function() {
        $('.plan ul li dl').matchHeight();
    });

    //郵便番号入力
    //https://github.com/ninton/jquery.jpostal.js
    $(window).ready( function() {
        $('#zip0').jpostal({
            postcode:[
                '#zip0',
                '#zip1'
            ],
            address:{
                '#address1':'%3',
                '#address2':'%4%5'
            }
        });
    });

    $(document).ready(function(){
        $('.mainimg').bxSlider({
            mode: 'fade',
            auto: true,
            speed: 2000,
            pager: false,
            controls: false,
            responsive: true
        });
    });


    //同意ボタン
    $(document).ready(function(){
        disabled_submit_btn();
        reset_consent_btn();
    });

    //確認するボタンの無効化
    function disabled_submit_btn() {
        $('input[name=submit].btn_css_check')
            .prop("disabled", true)
            .addClass('not_approval');
    }

    //確認するボタンの有効化
    function abled_submit_btn() {
        $('input[name=submit].btn_css_check')
            .prop("disabled", false)
            .removeClass('not_approval');
    }

    //同意ラジオボタンのリセット
    function reset_consent_btn() {
        $('input[name=consent]#no').prop('checked', true);
    }

    //同意ラジオボタンによる確認するボタンの変更
    $('input[name="consent"]').change(function() {
        ($('input[name=consent]#yes').is(':checked')) ? abled_submit_btn() : disabled_submit_btn();
    });

    //リセット時のchangeイベントへのフック
    $('input[type=reset]').click(function(e){
        disabled_submit_btn()
    });

</script>