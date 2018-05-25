<br>
ご登録いただきありがとうございます。<br>
下記の内容でご登録を受付いたしました。<br>
<br>
────────────────────────────────────<br>
<br>
【お名前】<br>
{{ $user['last_name'] }}　{{ $user['first_name'] }}<br>
<br>
【ふりがな】<br>
{{ $user['last_name_kana'] }}　{{ $user['first_name_kana'] }}<br>
<br>
【携帯電話番号】<br>
{{ $user['mobile_tel'] }}<br>
<br>
【お電話番号】<br>
{{ $user['tel'] }}<br>
<br>
<br>
【ご住所】<br>
〒{{ $user['zip_code'] }}<br>
都道府県：{{ config('pref')[$user['pref_id']] }}<br>
市区町村・番地：{{ $user['address1'] }}<br>
ビル・マンション等：{{ $user['address2'] }}<br>
<br>
【メールアドレス】<br>
{{ $user['email'] }}<br>
<br>
<br>
【ご希望のレンタル時計】<br>
@if (!empty($user['brand_id']))
{{ \App\Models\Brand::findOrFail($user['brand_id'])->name }}<br>
@endif
<br>
────────────────────────────────────<br>
<br>
サービスの開始時に改めて担当よりご連絡させていただきます。<br>
今しばらくお待ちくださいませ。<br>
<br>
この度はご登録いただき誠にありがとうございます。<br>
<br>
========================================================================<br>
<br>
ROLLY（ローリー）<br>
- You Only Live Once -<br>
大阪府大阪市中央区南久宝寺町2-2-5 YOLO Bld 1F<br>
http://r-tokei.jp/<br>
<br>
========================================================================<br>

