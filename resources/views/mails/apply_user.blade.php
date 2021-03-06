<br>
{{ $order->user->last_name }} {{ $order->user->first_name }}様<br>
<br>
時計レンタルROLLYのご利用有難うございます。<br>
商品のお申込みを承りました。<br>
<br>
申し込みの予約受付となりますので、決済フォームよりお支払(クレジットカード)情報をご入力ください。<br>
※決済フォームより情報を送信いただくと、決済予約となります。<br>
※商品発送の手配が済みましたら本決済を行います。<br>
※現時点では決済は行われておりません。<br>
{{--決済が完了しましたら商品の発送準備に取り掛からせていただきます。<br>--}}
{{--今しばらくお待ちください。<br>--}}
{{--決済完了時に改めてメールにてご連絡させていただきます。<br>--}}
<br>
【御予約内容】<br>
お名前<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->last_name }} {{ $order->user->first_name }}<br>
ふりがな<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->last_name_kana }} {{ $order->user->first_name_kana }}<br>
携帯電話番号<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->mobile_tel }}<br>
送付先住所<br>
&nbsp;&nbsp;&nbsp;郵便番号<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->zip_code }}<br>
&nbsp;&nbsp;&nbsp;都道府県<br>
&nbsp;&nbsp;&nbsp;{{ config('pref')[$order->user->pref_id] }}<br>
&nbsp;&nbsp;&nbsp;市区町村・番地<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->address1 }}<br>
&nbsp;&nbsp;&nbsp;ビル・マンション等<br>
&nbsp;&nbsp;&nbsp;{{ $order->user->address2 }}<br>
ご希望のレンタル時計<br>
&nbsp;&nbsp;&nbsp;{{ $order->product->brand->name }} {{ $order->product->model_name }}<br>
お申込みプラン<br>
&nbsp;&nbsp;&nbsp;{{ $order->product->plan->name }}プラン<br>
ご利用金額（月額税抜）<br>
&nbsp;&nbsp;&nbsp;{{ number_format($order->product->plan->getMonthlyPrice($order->product->plan->id)) }}円<br>
<br>
以上の内容で承っております。<br>
<br>
★時計のレンタルには本人確認が必要です★<br>
※ご本人確認がお済みでないお客様には電話連絡等を行う場合がございます。<br>
<br>
==================================================================<br>
時計レンタル　“ＲＯＬＬＹ”<br>
http://r-tokei.jp/<br>
営業時間：11:00~16:00<br>
所在地：〒541-0058　大阪市中央区南久宝寺町2-2-5　YOLOビル1F<br>
E-mail：rolly-rental@daishin.jp.net<br>
==================================================================<br>





