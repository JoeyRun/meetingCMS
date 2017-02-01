<?php
$filepath=__FILE__;
$newarray=explode("\\",$filepath);
$num=count($newarray)-1;
$filenamelen=strlen($newarray[$num]);
$totallen=strlen(__FILE__);
$subnum=$totallen-$filenamelen-5;
$tmppath=substr(__FILE__,0,$subnum);
$newpath=$tmppath."db\db_meeting.mdb";                      //数据库路径
include "adodb5/adodb.inc.php";								//载入adodb
$conn = ADONewConnection('access');							//建立accessl连接
$conn->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$newpath");
$conn->execute("set names gb2312");
?>