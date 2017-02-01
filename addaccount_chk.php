<?php
session_start();
include_once("conn/conn.php");
$acc_chk="select * from tb_meeting_user where userName='$_POST[newuser]'";                                                         //判断帐号是否已经存在
$acc_rst_chk=$conn->Execute($acc_chk);
 if(!$acc_rst_chk->EOF){
 echo "<script>alert('该帐号已存在！！');history.go(-1);</script>";
 }else{
  if(empty($_POST["newuser"]) or $_POST["department"]=="请选择部门" or empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){   //判断是否有留空
  echo "<script>alert('请正确填写信息');history.go(-1);</script>";
  }else if($_POST["newpwd"]==$_POST["newpwdtwice"]){
          $sqladdacc="insert into tb_meeting_user(userName,userPassword,userDepart)values('$_POST[newuser]','$_POST[newpwdtwice]','$_POST[department]')";
	  	  $addacc_rst=$conn->Execute($sqladdacc);
		  if($addacc_rst==true){
              echo "<script>alert('帐号添加成功！！');window.close();</script>";
			  }else{
			   echo "<script>alert('添加失败！！请重新添加');history.go(-1);</script>";
			  }
          }else{
	    echo "<script>alert('两次输入的密码不一样！！');history.go(-1);</script>";
   }
 } 
?>