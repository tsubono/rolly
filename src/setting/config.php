<?php
//<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
/*--------------------------------------------------------------------------
	�ե�����᡼�� - sformmmail2
	(c)Sapphirus.Biz

	�����Υ�����ץȤ�ʸ�����󥳡��ɤ� euc-jp �����ѹ����ʤ��ǲ�������
--------------------------------------------------------------------------*/

/* ���������� */
// ����᡼�륢�ɥ쥹��$mailTo[0]��ɬ�ܡ�
$mailTo[0] = 'rolly-rental@daishin.jp.net';
$mailTo[1] = 'tsuboi@ga-design.jp';
$mailTo[2] = '';

$maxText = 2000;// �ƥ����Ȥκ�������ʸ����
$mailBcc = 'tsuboi@ga-design.jp';// BCC�ǥ��饤�����¦���������᡼�륢�ɥ쥹�ʥ��ץ�����
$replyBcc = '';// BCC�����Ѽ�¦���������᡼�륢�ɥ쥹�ʥ��ץ�����
$replyAddress = 'rolly-rental@daishin.jp.net';// ��ư�ֿ������������᡼�륢�ɥ쥹�ʥ��ץ�����
$replyName = '��ư�ֿ��᡼��';// ��ư�ֿ������������᡼�륢�ɥ쥹���ղä���̾���ʥ��ץ�����
$returnPath = '';// �������顼������äƤ���᡼��μ��������ѹ�������Υ᡼�륢�ɥ쥹�ʥ��ץ�����

/* �����ץ�������� */
$ref_check = 1;  // ��ե���ˤ�볰���ɥᥤ�󤫤�λ��Ѥ����¡ʤ���[1]/���ʤ�[0]��
$ill_char = 0;   // ʸ�������������[1]�ˤ��Ƥߤ�
$ill_slash = 0;  // ���������ʸ���ˡ�\�פ��դ��Ƥ��ޤ�����[1]�ˤ��Ƥߤ�
$use_ssl = 1;    // https�Ǥ����Ѥξ��1�����ɥᥤ���secure�⤷����ssl���ޤޤ����Ͼ�����ꤵ��ޤ�
$resendCheck = 1;// �֥饦�����Ĥ���ʥ��å�����˴��ˤޤǺ����ɻߡʤ���[1]/���ʤ�[0]��
$baseEnc = '';   // �ե�����HTML��ʸ�����󥳡��ɤ����ꤹ�����sjis��euc-jp��utf-8�ˢ����ꤷ�ʤ���� sfm_form.html ��ʸ�����󥳡��ɤ˹�碌�ޤ�

// ���ƥ�ץ졼������ե�����
$temp_html = array(
 	'form'		=> 'form.php' // ���ϥե�������
,	'confirm'	=> 'confirm.php' // ��ǧ������
,	'completion'	=> 'completion.php' // ������λ����
,	'mail'		=> 'mail/mail_tmpl.php' // �᡼��������
,	'reply'		=> 'mail/reply_tmpl.php' // ��ư�ֿ��᡼����
);

// ���顼ɽ������
$temp_err = array(
	'__Error_Input_Data__'		=> '<span style="color:red;">ɬ�ܹ��ܤ�̤���ϤǤ�</span>'
,	'__Error_Marge_Data__'		=> '<span style="color:red;">���Ϥ��줿���Ƥ���­������ޤ�</span>'
,	'__Error_Mail_Address__'	=> '<span style="color:red;">�᡼�륢�ɥ쥹������������ޤ���</span>'
,	'__Error_Mail_Check__'		=> '<span style="color:red;">�᡼�륢�ɥ쥹�����פ��ޤ���</span>'
,	'__Error_Text_Max__'		=> '<span style="color:red;">ʸ������¿�����ޤ���__Text_Max__���ޤǡ�</span>'
);

// ���顼ɽ����HTML
$temp_err_result = array(
	'form'		=> '<div><span class="ERR">__Result__</span></div>' // �ե����������
,	'confirm'	=> '<span class="ERR">__Result__</span>' // ��ǧ������
);

// ƱNAME��ʣ�����ܤη������
$name_marge = array(
	'tel'		=> '-'
,	'fax'		=> '-'
,	'zip'		=> '-'
,	'day'		=> '/'
,	'address'	=> "\n"
);



$day_year = "����";
$day_year2 = "ǯ";
$day_date = "��";
$day_day = "��";




// COMFIRM submitɽ������
function printSubmit($error)
{
	// ���������ܥ���ɽ������
	$button_text = array(
		'send'	=> '�� ��'
	,	'back'	=> '���ϲ��̤����'
	);
	if ($error == 1) {
		// ���顼���������HTML����
		$submit = <<< EOD
<p class="formtxt mt30 txt_c">���ܥ��󤫤����ϥڡ�������ꡢɬ�ܹ��ܤ����Ϥ��Ƥ���������</p>
<ul class="sendarea_c">
<li><a href="#" onclick="javascript:window.history.back(-1);return false;"><input type="submit" name="back" value="���ϲ��̤����" class="btn_css_reset" /></a></li>
<ul>
EOD;


	} else {
		// ���ܤ�����������HTML����
		$submit = <<< EOD
<p class="formtxt mt30 txt_c">�嵭���ƤǤ��ְ㤤�ʤ���������ܥ���򲡤��Ʋ�������<br/>
���Ϥ������Ƥ������������ϡ����ܥ���򲡤������ϥե�����ؤ���꤯��������</p>
<ul class="sendarea">
	<li><input type="button" name="back" id="back" onclick="history.back()" value="���ϲ��̤����" class="btn_css_reset" /></li>
	<input type="hidden" name="mode" id="mode" value="SEND" />
	<li><input type="submit" name="submit" id="submit" class="btn_css_check" /></li>
</ul>
EOD;
	}
	return $submit;
}
?>
