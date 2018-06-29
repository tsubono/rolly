<br>
以下の内容でホームページからお申込みを受け付けました。<br>
<br><br>
────────────────────────────────────<br>
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
