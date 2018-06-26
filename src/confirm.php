<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	<title>時計レンタル ROLLY（ローリー）│高級腕時計の定額レンタルサービス</title>
    <meta name="keywords" content="時計,レンタル,ROLLY,ローリー,ロレックス,ROLEX,HUBLOT,ウブロ," />
	<meta name="description" content="高級腕時計レンタルのROLLY│ローリーではロレックスやフランクミューラー、ウブロ、IWCなどの憧れの高級腕時計を定額でレンタルできます。憧れの時計ブランド、そんな夢を“レンタル”という形でご提供致します。時計をレンタルでお楽しみください。" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
</head>
<body class="form_bg">
    <header>
        <div class="mainwrap"> 
            <ul class="mainimg">
                <li><img src="img/bx_rolly1.png" alt="ROLEX腕時計"></li>
                <li><img src="img/bx_rolly2.png" alt="ROLEX"></li>
                <li><img src="img/bx_rolly3.png" alt="腕時計"></li>
            </ul>
        </div>   
      <h1 class="logo"><img src="img/logo.png" alt="時計レンタル ROLLY"></h1>
        <div class="scroll">
            <p class="txt">
                    <span>現在、新規会員募集継続中　※混雑を防ぐため先着500名までとさせていただいております。サービス開始時には順次ご案内いたします。</span>
            </p>
        </div>
    </header>
		<section class="registform mt90">
            <h1 class="txt_c mb50"><img src="img/hd_service.png" alt="To use the service"><em>サービスご利用登録</em></h1>

            <ul class="flow cf">
                <li class="fl">STEP.1<br><em>登録フォーム入力</em></li>
                <li class="selected fl">STEP.2<br><em>登録確認画面</em></li>
                <li class="fl">STEP.3<br><em>完了</em></li>
            </ul>
            


	<form class="cf" method="post" action="<?php echo $sfm_script; ?>">
    <div id="formwrap">

    <!-- ▼お名前▼ -->
    <dl class="formitem hissu">
        <dt class="item_name">お名前</dt>
        <dd class="item_content"><dl>姓:&nbsp;<?php echo $sfm_html->name1; ?></dl>　<dl>名:&nbsp;<?php echo $sfm_html->name2; ?></dl></dd>
    </dl>
    <!-- ▲お名前▲ -->

    <!-- ▼ふりがな▼ -->
    <dl class="formitem hissu">
        <dt class="item_name">ふりがな</dt>
        <dd class="item_content"><dl>せい:&nbsp;<?php echo $sfm_html->kana1; ?></dl>　<dl>めい:&nbsp;<?php echo $sfm_html->kana2; ?></dl></dd>
    </dl>
    <!-- ▲ふりがな▲ -->

    <!-- ▼お電話番号▼ -->
    <dl class="formitem">
        <dt class="item_name">お電話番号</dt>
        <dd class="item_content"><?php echo $sfm_html->tel; ?></dd>
    </dl>
    <!-- ▲お電話番号▲ -->

    <!-- ▼FAX番号▼ -->
    <dl class="formitem">
        <dt class="item_name">FAX番号</dt>
        <dd class="item_content"><?php echo $sfm_html->fax; ?></dd>
    </dl>
    <!-- ▲FAX番号▲ -->

    <!-- ▼住所▼ -->
    <dl class="formitem">
        <dt class="item_name">ご住所</dt>
        <dd class="item_content">
            <dl class="innerlist_address add01">
                <dt>郵便番号</dt>
                <dd><?php echo $sfm_html->zip; ?></dd>
            </dl>
            <dl class="innerlist_address add02">
                <dt>都道府県</dt>
                <dd><?php echo $sfm_html->address1; ?></dd>
            </dl>
            <dl class="innerlist_address add03">
                <dt>市区町村・番地</dt>
                <dd><?php echo $sfm_html->address2; ?></dd>
            </dl>
            <dl class="innerlist_address add04">
                <dt>ビル・マンション等</dt>
                <dd><?php echo $sfm_html->address3; ?></dd>
            </dl>
        </dd>
    </dl>
    <!-- ▲住所▲ -->

    <!-- ▼メールアドレス[予約項目]▼ -->
    <dl class="formitem hissu">
        <dt class="item_name">メールアドレス</dt>
        <dd class="item_content"><?php echo $sfm_html->email; ?></dd>
    </dl>
    <!-- ▲メールアドレス[予約項目]▲ -->

    <!-- ▼ご希望のレンタル時計▼ -->
    <dl class="formitem hissu privacy">
        <dt class="item_name">ご希望のレンタル時計</dt>
        <dd class="item_content"><?php echo $sfm_html->type; ?></dd>
    </dl>
    <!-- ▲ご希望のレンタル時計▲ -->
    </div><!-- /#formwrap-->

    <input name="autoReply" type="hidden" value="1" />
    <!-- ▲返信メール確認（ autoReply は自動返信メールの有無）▲ -->

    <!-- ▼▼送信ボタン　CSSタイプ -->
    <?php echo $sfm_submit; ?>
    <!-- ▲▲送信ボタン　CSSタイプ -->
    <!-- ▲実行に必要な項目と送信ボタン▲ -->
</form>
	
	</section>
    
    <div class="sidefix"><a href="/lineup/"><img src="../img/lineup/tit_lineup_t.png" ></a></div>
    <footer>
        <nav>
            <ul class="cf">
                <li><a href="/guide/policy.html">プライバシーポリシー</a></li>
                <li><a href="/guide/notation.html">特定商取引法・古物営業法に基づく表記</a></li>
                <li><a href="/guide/company.html">会社概要</a></li>
            </ul>
        </nav>
        <address>
                <p>copyright &copy; 2018 daishin Co.,Ltd. All Right Reserved.</p>
        </address>
    </footer>
    <address>
            <p>copyright &copy; 2018 daishin Co.,Ltd. All Right Reserved.</p>
    </address>

	<!-- ■IE9以下のHTML5とcss3対策 -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="/common/js/html5shiv.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->
	<!-- ■JQUERY -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>
	<script>

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
	</script>
    <script src="js/jquery.bxslider.js"></script>
    <script src="js/marquee.js"></script>
    <script>
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
    $(function(){
        $('.scroll').marquee();
    });
    </script>
	</body>
</html>	