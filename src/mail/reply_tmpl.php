<?php
//<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
/*--------------------------------------------------------------------------
	�ե�����᡼�� - sformmmail2
	(c)Sapphirus.Biz

	�����Υ�����ץȤ�ʸ�����󥳡��ɤ� euc-jp �����ѹ����ʤ��ǲ�������
--------------------------------------------------------------------------*/

// ��ư�ֿ���Subject�ʷ�̾��
$replySubject = '��ROLLY�ۤ���Ͽ������դ��ޤ���';

//��ư�ֿ��᡼��
$replyMessage = <<< EOD
����Ͽ�����������꤬�Ȥ��������ޤ���
���������ƤǤ���Ͽ����դ������ޤ�����

������������������������������������������������������������������������

�ڤ�̾����
{$sfm_mail->name1}��{$sfm_mail->name2}

�ڤդ꤬�ʡ�
{$sfm_mail->kana1}��{$sfm_mail->kana2}

�ڷ��������ֹ��
{$sfm_mail->cell}

�ڤ������ֹ��
{$sfm_mail->tel}

�ڤ������
��{$sfm_mail->zip}
��ƻ�ܸ���{$sfm_mail->address1}
�Զ�Į¼�����ϡ�{$sfm_mail->address2}

�ڥ᡼�륢�ɥ쥹��
{$sfm_mail->email}

�ڤ���˾�Υ�󥿥���ס�
{$sfm_mail->type}

������������������������������������������������������������������������

�����ӥ��γ��ϻ��˲����ô����ꤴϢ�������Ƥ��������ޤ���
�����Ф餯���Ԥ����������ޤ���

�����٤Ϥ���Ͽ�����������ˤ��꤬�Ȥ��������ޤ���

========================================================================

ROLLY�ʥ����꡼��
- You Only Live Once -
���������������������Į2-2-5 YOLO Bld 1F
http://r-tokei.jp/

========================================================================
EOD;

?>