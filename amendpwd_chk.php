<?php
session_start();
include_once("conn/conn.php");
if(empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){
 echo "<script>alert('两次输入的密码均不能为空！！');history.go(-1);</script>";
}else{
     if($_POST["newpwd"]==$_POST["newpwdtwice"]){
	    $sqlstrix="update tb_meeting_user set userPassword='$_POST[newpwdtwice]' where userId =$_SESSION[id]";
		$apwd_rst=$conn->Execute($sqlstrix);
		if($apwd_rst){
           echo "<script>alert('修改成功！！');history.go(-1);</script>";
		}else{
		   echo "<script>alert('修改失败！！');history.go(-1);</script>";
		}
	}else{
        echo "<script>alert('两次输入的密码不相同！！');history.go(-1);</script>";
     }
}
?>