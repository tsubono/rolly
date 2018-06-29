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
【パスワード】<br>
{{ $password }}<br>
<br><br>
【ご希望のレンタル時計】<br>
@if (!empty($user['brand_id']))
{{ \App\Models\Brand::findOrFail($user['brand_id'])->name }}<br>
@endif
<br>
────────────────────────────────────<br>
<br>
ご希望のレンタル時計をご選択のうえ、お申し込みください。<br>
マイページよりご登録情報の編集が可能です。<br>
★時計のレンタルには本人確認が必要です★<br>
※顔写真付きの身分証明書をお持ちになり、お顔がわかる状態で撮影した写真をアップロードしてください。<br>
※顔写真付きの身分証明書をお持ちでないお客様は、健康保険証、住民票の写しの2点をアップロードしてください。<br>
<br>
ご不明点などお気軽にお問い合わせください。<br>
<br>
==================================================================<br>
時計レンタルROLLY　- You Only Live Once -<br>
http://r-tokei.jp/<br>
<br>
会社名：大進ホンダ株式会社<br>
所在地：〒541-0056　大阪市中央区久太郎町3-5-3<br>
E-mail：rolly-rental@daishin.jp.net<br>
==================================================================<br>

