<?php
$filepath=__FILE__;
$newarray=explode("\\",$filepath);
$num=count($newarray)-1;
$filenamelen=strlen($newarray[$num]);
$totallen=strlen(__FILE__);
$subnum=$totallen-$filenamelen-5;
$tmppath=substr(__FILE__,0,$subnum);
$newpath=$tmppath."db\db_meeting.mdb";                      //���ݿ�·��
include "adodb5/adodb.inc.php";								//����adodb
$conn = ADONewConnection('access');							//����accessl����
$conn->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$newpath");
$conn->execute("set names gb2312");
?>