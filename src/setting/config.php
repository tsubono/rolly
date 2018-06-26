<?php
//<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
/*--------------------------------------------------------------------------
	フォームメール - sformmmail2
	(c)Sapphirus.Biz

	※このスクリプトの文字エンコードは euc-jp から変更しないで下さい。
--------------------------------------------------------------------------*/

/* ■基本設定 */
// 受取メールアドレス（$mailTo[0]は必須）
$mailTo[0] = 'rolly-rental@daishin.jp.net';
$mailTo[1] = 'tsuboi@ga-design.jp';
$mailTo[2] = '';

$maxText = 2000;// テキストの最大入力文字数
$mailBcc = 'tsuboi@ga-design.jp';// BCCでクライアント側が受け取るメールアドレス（オプション）
$replyBcc = '';// BCCで利用者側が受け取るメールアドレス（オプション）
$replyAddress = 'rolly-rental@daishin.jp.net';// 自動返信時の送信元メールアドレス（オプション）
$replyName = '自動返信メール';// 自動返信時の送信元メールアドレスに付加する名前（オプション）
$returnPath = '';// 送信エラー等で戻ってくるメールの受け取りを変更する場合のメールアドレス（オプション）

/* ■オプション設定 */
$ref_check = 1;  // リファラによる外部ドメインからの使用の制限（する[1]/しない[0]）
$ill_char = 0;   // 文字化けする場合は[1]にしてみる
$ill_slash = 0;  // 特定の入力文字に「\」が付いてしまう場合は[1]にしてみる
$use_ssl = 1;    // httpsでの利用の場合1　※ドメインにsecureもしくはsslが含まれる場合は常に設定されます
$resendCheck = 1;// ブラウザを閉じる（セッション破棄）まで再送防止（する[1]/しない[0]）
$baseEnc = '';   // フォームHTMLの文字エンコードを設定する場合（sjis／euc-jp／utf-8）※設定しない場合 sfm_form.html の文字エンコードに合わせます

// ■テンプレート設定ファイル
$temp_html = array(
 	'form'		=> 'form.php' // 入力フォーム用
,	'confirm'	=> 'confirm.php' // 確認画面用
,	'completion'	=> 'completion.php' // 送信完了画面
,	'mail'		=> 'mail/mail_tmpl.php' // メール送信用
,	'reply'		=> 'mail/reply_tmpl.php' // 自動返信メール用
);

// エラー表示設定
$temp_err = array(
	'__Error_Input_Data__'		=> '<span style="color:red;">必須項目が未入力です</span>'
,	'__Error_Marge_Data__'		=> '<span style="color:red;">入力された内容に不足があります</span>'
,	'__Error_Mail_Address__'	=> '<span style="color:red;">メールアドレスが正しくありません</span>'
,	'__Error_Mail_Check__'		=> '<span style="color:red;">メールアドレスが一致しません</span>'
,	'__Error_Text_Max__'		=> '<span style="color:red;">文字数が多すぎます（__Text_Max__字まで）</span>'
);

// エラー表示用HTML
$temp_err_result = array(
	'form'		=> '<div><span class="ERR">__Result__</span></div>' // フォーム画面用
,	'confirm'	=> '<span class="ERR">__Result__</span>' // 確認画面用
);

// 同NAMEの複数項目の結合設定
$name_marge = array(
	'tel'		=> '-'
,	'fax'		=> '-'
,	'zip'		=> '-'
,	'day'		=> '/'
,	'address'	=> "\n"
);



$day_year = "西暦";
$day_year2 = "年";
$day_date = "月";
$day_day = "日";




// COMFIRM submit表示項目
function printSubmit($error)
{
	// 送信／戻るボタン表示設定
	$button_text = array(
		'send'	=> '送 信'
	,	'back'	=> '入力画面へ戻る'
	);
	if ($error == 1) {
		// エラーがある場合のHTML出力
		$submit = <<< EOD
<p class="formtxt mt30 txt_c">戻るボタンから入力ページへ戻り、必須項目を入力してください。</p>
<ul class="sendarea_c">
<li><a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="submit" name="back" value="入力画面へ戻る" class="btn_css_reset" /></a></li>
<ul>
EOD;


	} else {
		// 項目が正しい場合のHTML出力
		$submit = <<< EOD
<p class="formtxt mt30 txt_c">上記内容でお間違いなければ送信ボタンを押して下さい。<br/>
入力した内容を修正したい場合は、戻るボタンを押して入力フォームへお戻りください。</p>
<ul class="sendarea">
	<li><input type="button" name="back" id="back" onclick="history.back()" value="入力画面へ戻る" class="btn_css_reset" /></li>
	<input type="hidden" name="mode" id="mode" value="SEND" />
	<li><input type="submit" name="submit" id="submit" class="btn_css_check" /></li>
</ul>
EOD;
	}
	return $submit;
}
?>
