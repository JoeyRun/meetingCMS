<?php
//session_start();
include_once("conn/conn.php");
$id=$_GET["id"];
$sqlstrdd="delete from tb_meeting_depart where department_id=$id";
$dd_rst=$conn->Execute($sqlstrdd);
if($dd_rst==true){
   echo "<script>alert('ɾ���ɹ�����');history.go(-1);</script>";
}else{
   echo "<script>alert('ɾ���ɹ�����');history.go(-1);</script>";
}

?>