<?php
//<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
/*--------------------------------------------------------------------------
	フォームメール - sformmmail2
	(c)Sapphirus.Biz
	クライアント受取用メール内容
	※このスクリプトの文字エンコードは euc-jp から変更しないで下さい。
--------------------------------------------------------------------------*/

// 受け取る時のSubject（件名）
$mailSubject = 'ホームページから新規ご登録を受け付けました';

//送信メッセージ
$mailMessage = <<< EOD
以下の内容でホームページから新規ご登録を受け付けました。

■送信者情報============================================================

【お名前】
{$sfm_mail->name1}　{$sfm_mail->name2}

【ふりがな】
{$sfm_mail->kana1}　{$sfm_mail->kana2}

【携帯電話番号】
{$sfm_mail->cell}

【お電話番号】
{$sfm_mail->tel}

【ご住所】
〒{$sfm_mail->zip}
都道府県：{$sfm_mail->address1}
市区町村・番地：{$sfm_mail->address2}

【メールアドレス】
{$sfm_mail->email}

【ご希望のレンタル時計】
{$sfm_mail->type}

■ユーザー情報==========================================================

$sfm_userinfo

EOD;

?>
