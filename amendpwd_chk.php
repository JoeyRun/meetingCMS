<?php
session_start();
include_once("conn/conn.php");
if(empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){
 echo "<script>alert('������������������Ϊ�գ���');history.go(-1);</script>";
}else{
     if($_POST["newpwd"]==$_POST["newpwdtwice"]){
	    $sqlstrix="update tb_meeting_user set userPassword='$_POST[newpwdtwice]' where userId =$_SESSION[id]";
		$apwd_rst=$conn->Execute($sqlstrix);
		if($apwd_rst){
           echo "<script>alert('�޸ĳɹ�����');history.go(-1);</script>";
		}else{
		   echo "<script>alert('�޸�ʧ�ܣ���');history.go(-1);</script>";
		}
	}else{
        echo "<script>alert('������������벻��ͬ����');history.go(-1);</script>";
     }
}
?>