<?php
$tmppath=substr(__FILE__,0,26);
$newpath=$tmppath."db\db_meeting.mdb";                      //���ݿ�·��
include "adodb/adodb.inc.php";		//����adodb
$conn = ADONewConnection('access');	//����accessl����
$conn->Pconnect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$newpath");
$conn->execute("set names gb2312");
?>