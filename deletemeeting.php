<?php
session_start();
include_once("conn/conn.php");
$sqlstrdel="delete from tb_meeting_info where meeting_id=$_GET[id]";
$rst_del = $conn->execute($sqlstrdel);
if($rst_del==true){
echo "<script>alert('ɾ���ɹ�����');history.go(-1);</script>";
}else{
echo "<script>alert('ɾ��ʧ�ܣ�������ɾ��');history.go(-1);</script>";
}

?>