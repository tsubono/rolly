<?php
//<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
/*--------------------------------------------------------------------------
	�ե�����᡼�� - sformmmail2
	(c)Sapphirus.Biz

	�����Υ�����ץȤ�ʸ�����󥳡��ɤ� euc-jp �����ѹ����ʤ��ǲ�������
--------------------------------------------------------------------------*/
$script_version = '2.71'; // �ץ����С������

// ����ե������ɤ߹���
require_once('./setting/config.php');

// ���������˳�Ǽ
$sfm_cfg = array(
	'ref_check'			=> $ref_check
,	'ill_char'			=> $ill_char
,	'ill_slash'			=> $ill_slash
,	'resendCheck'		=> $resendCheck
,	'use_ssl'			=> $use_ssl
,	'mailTo'			=> $mailTo
,	'baseEnc'			=> $baseEnc
,	'maxText'			=> $maxText
,	'mailBcc'			=> $mailBcc
,	'replyBcc'			=> $replyBcc
,	'replyAddress'		=> $replyAddress
,	'replyName'			=> $replyName
,	'returnPath'		=> $returnPath
,	'temp_html'			=> $temp_html
,	'temp_err'			=> $temp_err
,	'temp_err_result'	=> $temp_err_result
,	'name_marge'		=> $name_marge
,	'script_version'	=> $script_version
);

$sfm_cfg['temp_err']['__Error_Text_Max__'] = preg_replace('/__Text_Max__/', $sfm_cfg['maxText'], $sfm_cfg['temp_err']['__Error_Text_Max__']);

if (!$baseEnc) {
	$baseEnc = file_get_contents($temp_html['form']);
	$sfm_cfg['baseEnc'] = mb_detect_encoding($baseEnc, 'euc-jp, sjis, utf-8');
}

// �������󥳡��ɤ������euc-jp �����
$sfm_cfg['internal_enc'] = 'euc-jp';
new SbFormMailClass($sfm_cfg);
exit;


/* ���饹��� */
class SbFormMailClass
{
	var $cfg;
	function SbFormMailClass($cfg)
	{
		$this->cfg = $cfg;
		if (!extension_loaded('mbstring')) {
			$this->exitErr('�ޥ���Х��ȴؿ������ѤǤ��ޤ���');
		}
		mb_language('ja');
		mb_internal_encoding($cfg['internal_enc']);

		// ��С����ץ������б�
		$_SERVER['HTTP_HOST'] = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ?
		$_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST'];
		$_SERVER['REMOTE_ADDR'] = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ?
		$_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
		$_SERVER['SERVER_NAME'] = isset($_SERVER['HTTP_X_FORWARDED_SERVER']) ?
		$_SERVER['HTTP_X_FORWARDED_SERVER'] : $_SERVER['SERVER_NAME'];

		// ������ץ�̾�����
		$cfg['script_name'] = preg_replace('/.+\/(.*)/', "$1", $_SERVER['REQUEST_URI']);
		// ������ꥢ�ɥ쥹�����������å�
		if (!isset($cfg['mailTo'][0])) {
			$this->exitErr('������᡼�륢�ɥ쥹�����ꤵ��Ƥޤ���');
		}

		// �⡼�ɤˤ����ʬ��
		$mode = '';
		if (isset($_POST['mode'])) {
			$mode = $_POST['mode'];
		}
		if (isset($_POST['back'])) {
			$mode = 'BACK';
		}
		switch ($mode) {
			// �᡼������
			case 'SEND':
				session_cache_limiter('nocache');
				session_start();
				if (!isset($_SESSION['SFM'])) {
					$this->exitErr('���å������󤬼����ޤ��������٥֥饦�����Ĥ��Ʋ�������', 1);
				}
				$sfm_mail = $this->formDataMail();
				$sfm_userinfo = $this->userInfo();


if (strstr($sfm_userinfo, 'iPhone')) {
$devicetype = 'SP';
}elseif(strstr($sfm_userinfo, 'Android')){
$devicetype = 'SP';
}elseif(strstr($sfm_userinfo, 'Windows Phone')){
$devicetype = 'SP';
}else{
$devicetype = 'PC';
};
				$mailToNum = $_SESSION['SFM']['mailToNum'];
				$cfg['mailTo'] = (isset($cfg['mailTo'][$mailToNum])) ? $cfg['mailTo'][$mailToNum] : $cfg['mailTo'][0];
				// ������˥᡼������
				$mailFrom = (!isset($_SESSION['SFM']['email'])) ? 'S.B.Formmail' : $_SESSION['SFM']['email'];
				require_once($cfg['temp_html']['mail']);
				$this->sendMail($cfg['mailTo'],$devicetype.'��������:'.$mailSubject, $mailMessage, $mailFrom, $cfg['mailBcc']);
				// �᡼�뼫ư�ֿ�
				if ((isset($_POST['autoReply']) || isset($_SESSION['SFM']['autoReply'])) &&
				isset($_SESSION['SFM']['email']) && is_file($cfg['temp_html']['reply'])) {
					require_once($cfg['temp_html']['reply']);
					$replyAddress = ($cfg['replyAddress']) ? $cfg['replyAddress'] : $cfg['mailTo'];
					if ($cfg['replyName']) {
						$replyAddress = "{$cfg['replyName']} <{$replyAddress}>";
					}
					$this->sendMail($_SESSION['SFM']['email'], $replySubject, $replyMessage, $replyAddress, $cfg['replyBcc']);
				}
				unset($_SESSION['SFM']);
				$_SESSION['SFM_TransCheck'] = 1;
				require_once($cfg['temp_html']['completion']);
				break;
			// �ǡ��������ȳ�ǧ
			case 'CONFIRM':
				session_cache_limiter('private_no_expire');
				session_start();
				$sfm_userinfo = $this->userInfo();
				if ($cfg['resendCheck'] == 1 && $_SESSION['SFM_TransCheck'] == 1) {
					$this->exitErr('��������λ���Ƥ��ޤ��Τǡ����٥֥饦�����Ĥ��Ʋ�������', 1);
				}
				if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != '') ||
				(preg_match('/secure|ssl/i', $_SERVER['HTTP_HOST'])) ||
				($cfg['use_ssl'] == 1)) {
					$protcol = 'https://';
				} else {
					$protcol = 'http://';
				}
				if ((!preg_match("/{$_SERVER['HTTP_HOST']}/", $_SERVER['HTTP_REFERER'])) && $cfg['ref_check']) {
					$this->exitErr('�����ɥᥤ�󤫤�����ѤϤǤ��ޤ���');
				}
				unset($_SESSION['SFM']);
				$error = $email = '';
				foreach ($_POST as $key => $value) {
					$name = preg_replace('/(.+)_s$/', "$1", $key);
					if ($value == 'none') {
						$value = '';
					}
					if (is_array($value)) {
						$value = $this->valueMarge($key, $value, $cfg['name_marge']);
						if ($value == '__Error_Marge_Data__') {
							$error = 1;
						}
					}
					if (!$cfg['ill_slash']) {
						$value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;
					}
					if (!$cfg['ill_char']) {
						$value = mb_convert_encoding($value, $cfg['internal_enc'], $cfg['baseEnc']);
					}
					$value = mb_convert_kana($value, 'KV', $cfg['internal_enc']);
					if (preg_match('/_s$/', $key) && $value == '') {
						$_SESSION['SFM'][$name] = '__Error_Input_Data__';
						$error = 1;
					} elseif ($name == 'email' && $value) {
						if (!preg_match("/^[\w\-\.]+\@[\w\-\.]+\.([a-z]+)$/", $value)) {
							$_SESSION['SFM']['email'] = '__Error_Mail_Address__';
							$error = $email = 1;
						} else {
							$_SESSION['SFM']['email'] = $email = $value;
						}
					} elseif ($name == 'emailcheck') {
						if ($email != 1 && $email != $value) {
							$_SESSION['SFM']['email'] = '__Error_Mail_Check__';
							$error = 1;
						}
					} elseif ($cfg['maxText'] && strlen($value) > $cfg['maxText']) {
						$_SESSION['SFM'][$name] = '__Error_Text_Max__';
						$error = 1;
					} else {
						$_SESSION['SFM'][$name] = $value;
					}
				}
				$_SESSION['SFM']['InputErr'] = $error;
				$sfm_script = $cfg['script_name'];
				$sfm_html = $this->formDataHtml();
				$sfm_submit = mb_convert_encoding(printSubmit($error), $cfg['baseEnc'], $cfg['internal_enc']);
				session_write_close();
				session_cache_limiter('nocache');
				session_start();
				require_once($cfg['temp_html']['confirm']);
				break;
			// ���ϥե�����ɽ��
			default:
				session_cache_limiter('private_no_expire');
				session_start();
				if ($mode != 'BACK') {
					unset($_SESSION['SFM']);
				}
				$sfm_script = $cfg['script_name'];
				$_SESSION['SFM_TransCheck'] = 0;
				require_once($cfg['temp_html']['form']);
				break;
		}
	}

	// ƱNAME��ʣ�����ܤη�����
	function valueMarge($key, $val, $name_marge)
	{
		$name = preg_replace('/(.+)_s$/', "$1", $key);
		$rep = (array_key_exists($name, $name_marge)) ? $name_marge[$name] : "\t";
		$set_err = 0;
		foreach ($val as $tmp_key => $tmp_val) {
			if ($tmp_val == 'none') $tmp_val = '';
			if (preg_match('/_s$/', $key) && ($tmp_val == '')) $set_err = 1;
			if ($tmp_val == '') unset($val[$tmp_key]);
		}
		if ($set_err == 1 && array_values($val)) return '__Error_Marge_Data__';
		$val = implode($rep, $val);
		return $val;
	}

	// HTML�ǡ�����Ǽ
	function formDataHtml()
	{
		if (!isset($_SESSION['SFM'])) return false;
		$arr = $_SESSION['SFM'];
		$array_data = array();
		foreach ($arr as $key => $val) {
			$array_data[$key] = $this->valDataHtml($val);
		}
		if (!isset($array_data['autoReply'])) $array_data['autoReply'] = '&nbsp;';
		return (object) $array_data;
	}

	// HTML�ǡ�������
	function valDataHtml($val)
	{
		$val = (get_magic_quotes_gpc()) ? stripslashes($val) : $val;
		// ɽ���Ѥ�ʣ�����ܤ����
		$val = preg_replace('/\t/', "\n", $val);
		$val = htmlspecialchars($val, ENT_QUOTES, $this->cfg['internal_enc']);
		$val = nl2br($val);
		if (preg_match('/__Error_.+__/', $val)) {
			$val = preg_replace('/__Result__/', $this->cfg['temp_err'][$val], $this->cfg['temp_err_result']['confirm']);
		}
		$val = ($val != '') ? $val : '&nbsp;';
		$val = mb_convert_encoding($val, $this->cfg['baseEnc'], $this->cfg['internal_enc']);
		return $val;
	}

	// MAIL�ǡ�����Ǽ
	function formDataMail()
	{
		if (!isset($_SESSION['SFM'])) return false;
		$arr = $_SESSION['SFM'];
		$array_data = array();
		foreach ($arr as $key => $val) {
			$array_data[$key] = $this->valDataMail($val);
		}
		return (object) $array_data;
	}

	// MAIL�ǡ�������
	function valDataMail($val)
	{
		$val = (get_magic_quotes_gpc()) ? stripslashes($val) : $val;
		// �᡼���Ѥ�ʣ�����ܤ򥫥�޶��ڤ�
		$val = preg_replace('/\t/', ',', $val);
		return $val;
	}

	// �᡼����������
	function sendMail($mailTo, $mailSubject, $mailMessage, $mailFrom, $mailBcc)
	{
		//return; // [debug]
		if (preg_match('/(.+)(\s<.+\@.+>)$/', $mailFrom, $tmp)) {
			$tmp[1] = mb_encode_mimeheader($tmp[1]);
			$mailFrom = $tmp[1].$tmp[2];
		}
		$mailHeader  = "From: {$mailFrom}\n";
		if ($mailBcc) {
			$mailHeader .= "Bcc: {$mailBcc}\n";
		}
		$php_ver = phpversion();
		$mailMessage = preg_replace('/\r\n|\r/', "\n", $mailMessage);
		if (isset($this->cfg['returnPath']) && $this->cfg['returnPath']) {
			$result = mb_send_mail($mailTo, $mailSubject, $mailMessage, $mailHeader, "-f{$this->cfg['returnPath']}");
		} else {
			$result = mb_send_mail($mailTo, $mailSubject, $mailMessage, $mailHeader);
		}
		return $result;
	}

	// �桼�����������
	function userInfo()
	{
		$remote_addr = @gethostbyaddr($_SERVER['REMOTE_ADDR']);
		$info  = "{$remote_addr}\n";
		$info .= "{$_SERVER['HTTP_USER_AGENT']}\n";
		$info .= date("Y/m/d - H:i:s");
		return $info;
	}

	// ���顼ɽ����HTML
	function exitErr($err, $btn = 0)
	{
		$btn = (!$btn) ? "<input type=\"button\" value=\"�� ��\" onclick=\"history.back()\">" : '';
		echo <<< EOM
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset={$this->cfg['internal_enc']}">
<title>Error: {$err}</title>
</head>
<body style="font-size: 12px; line-height: 1.8em">
<strong>Error: </strong>{$err}<br>
{$btn}
</body>
</html>

EOM;
	exit;
	}
}

/* �ե������������ɽ�� */
function value($name)
{
	global $sfm_cfg;
	$val = '';
	if (isset($_SESSION['SFM'][$name])) {
		$val = $_SESSION['SFM'][$name];
		if (preg_match('/__Error_.+__/', $val)) {
			$val = '';
		} else {
			$val = mb_convert_encoding($val, $sfm_cfg['baseEnc'], $sfm_cfg['internal_enc']);
		}
	}
	echo $val;
}

/* �ե�������Υ��顼ɽ�� */
function err($name)
{
	global $sfm_cfg;
	$val = '';
	if (isset($_SESSION['SFM'][$name])) {
		$val = $_SESSION['SFM'][$name];
		if (preg_match('/__Error_.+__/', $val)) {
			$val = preg_replace('/__Result__/', $sfm_cfg['temp_err'][$val], $sfm_cfg['temp_err_result']['form']);
			$val = mb_convert_encoding($val, $sfm_cfg['baseEnc'], $sfm_cfg['internal_enc']);
		} else {
			$val = '';
		}
	}
	echo $val;
}

?>