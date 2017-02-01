<?php
session_start();
include_once("conn/conn.php");
$sqlstrdel="delete from tb_meeting_info where meeting_id=$_GET[id]";
$rst_del = $conn->execute($sqlstrdel);
if($rst_del==true){
echo "<script>alert('删除成功！！');history.go(-1);</script>";
}else{
echo "<script>alert('删除失败！请重新删除');history.go(-1);</script>";
}

?>