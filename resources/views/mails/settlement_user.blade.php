<br>
{{ $order->user->last_name }} {{ $order->user->first_name }}様<br>
<br>
時計レンタルROLLYのご利用有難うございます。<br>
お申込みされました商品の決済を行いました。<br>
下記内容をご確認くださいませ。<br>
<br>
【決済内容】<br>
ご希望のレンタル時計<br>
&nbsp;&nbsp;&nbsp;{{ $order->product->brand->name }} {{ $order->product->model_name }}<br>
<br>
お申込みプラン<br>
&nbsp;&nbsp;&nbsp;{{ $order->product->plan->name }}プラン<br>
<br>
ご利用金額（月額税抜）<br>
&nbsp;&nbsp;&nbsp;{{ number_format($order->product->plan->getMonthlyPrice($order->product->plan->id)) }}円<br>
<br>
決済日<br>
&nbsp;&nbsp;&nbsp;{{ $order->settlement_date->format('Y年m月d日') }}<br>
<br>
返却予定日<br>
&nbsp;&nbsp;&nbsp;{{ $order->return_date->format('Y年m月d日') }}<br>
<br>
※当店に返却された日が返却日となります。予定迄に必着でご返送ください。<br>
<br>
==================================================================<br>
時計レンタル　“ＲＯＬＬＹ”<br>
http://r-tokei.jp/<br>
営業時間：11:00~16:00<br>
所在地：〒541-0058　大阪市中央区南久宝寺町2-2-5　YOLOビル1F<br>
E-mail：rolly-rental@daishin.jp.net<br>
==================================================================<br>





