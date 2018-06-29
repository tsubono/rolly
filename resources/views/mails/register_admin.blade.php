<br>
以下の内容でホームページから新規ご登録を受け付けました。<br>
<br>
■送信者情報============================================================<br>
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
【パスワード】<br>
{{ $password }}<br>
<br>
<br>
【ご希望のレンタル時計】<br>
@if (!empty($user['brand_id']))
    {{ \App\Models\Brand::findOrFail($user['brand_id'])->name }}<br>
@endif
<br>

