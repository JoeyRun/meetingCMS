<?php
session_start();
include_once("conn/conn.php");                                                           //�������ݿ������ļ�
if(empty($_POST["username"]) or empty($_POST["pass"])){
echo "<script>alert('�û��������벻��Ϊ�գ�');history.go(-1);</script>";
}else{ 
  $username=$_POST["username"];
  $pass=$_POST["pass"];
  $sqltest="select * from tb_meeting_user where userName='$username'";                   //�жϵ�¼�û����Ƿ����
  $testrst=$conn->Execute($sqltest);                                                     //ִ�в�ѯ����
  if(!$testrst->EOF){
    $sqlstr="select * from tb_meeting_user where userName='$username' and userPassword='$pass'";
    $rst=$conn->Execute($sqlstr);
      if(!$rst->EOF){                                                                    //�жϵ�¼�û����������Ƿ���ȷ
	    if($rst->fields[6]==0){                                                          //�жϵ�¼�û��Ƿ񱻶���
          $_SESSION["id"]=$rst->fields[0];                                               //��ֵ��SESSION����
          $_SESSION["name"]=$rst->fields[1];
          $_SESSION["rights"]=$rst->fields[5];
		  $_SESSION["lasttime"]=$rst->fields[3];                                      
		  $logindate=date("Y-m-d ").date("G:i:s");                                       //��ǰ��¼ʱ��
		  $logincount=$rst->fields[4];                                                   //��ǰ��¼����             
		  $logincount++;                                                                 //��¼��������1
	      $sqlstrud="update tb_meeting_user set userLoginCount=$logincount,userLastLoginDate='$logindate' where userId = $_SESSION[id]";   //���µ�¼������ʱ��
		  $conn->Execute($sqlstrud);
          echo "<meta http-equiv=\"refresh\" content=\"2;url=manager.php\" />";
		  echo "<center><img src='images/loginwait.jpg' width='1003' height='636' /></center>";
		  }else if($rst->fields[6]==1){
		  echo "<script>alert('���û��ʺ��ѱ����� ����ϵ����Ա��');history.go(-1);</script>";
		  }
      }else{
        echo "<script>alert('������������µ�¼��');history.go(-1);</script>";
      }
  }else{
  echo "<script>alert('���û��������ڣ��������µ�¼��');history.go(-1);</script>";
 }
}

?>
