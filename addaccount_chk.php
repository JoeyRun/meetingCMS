<?php
session_start();
include_once("conn/conn.php");
$acc_chk="select * from tb_meeting_user where userName='$_POST[newuser]'";                                                         //�ж��ʺ��Ƿ��Ѿ�����
$acc_rst_chk=$conn->Execute($acc_chk);
 if(!$acc_rst_chk->EOF){
 echo "<script>alert('���ʺ��Ѵ��ڣ���');history.go(-1);</script>";
 }else{
  if(empty($_POST["newuser"]) or $_POST["department"]=="��ѡ����" or empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){   //�ж��Ƿ�������
  echo "<script>alert('����ȷ��д��Ϣ');history.go(-1);</script>";
  }else if($_POST["newpwd"]==$_POST["newpwdtwice"]){
          $sqladdacc="insert into tb_meeting_user(userName,userPassword,userDepart)values('$_POST[newuser]','$_POST[newpwdtwice]','$_POST[department]')";
	  	  $addacc_rst=$conn->Execute($sqladdacc);
		  if($addacc_rst==true){
              echo "<script>alert('�ʺ���ӳɹ�����');window.close();</script>";
			  }else{
			   echo "<script>alert('���ʧ�ܣ������������');history.go(-1);</script>";
			  }
          }else{
	    echo "<script>alert('������������벻һ������');history.go(-1);</script>";
   }
 } 
?>