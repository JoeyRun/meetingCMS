<?php
$tmppath=substr(__FILE__,0,26);
$newpath=$tmppath."db\db_meeting.mdb";                      //数据库路径
include "adodb/adodb.inc.php";		//载入adodb
$conn = ADONewConnection('access');	//建立accessl连接
$conn->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$newpath");
$conn->execute("set names gb2312");
?>