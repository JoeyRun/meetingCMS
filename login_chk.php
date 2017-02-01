<?php
session_start();
include_once("conn/conn.php");                                                           //加载数据库连接文件
if(empty($_POST["username"]) or empty($_POST["pass"])){
echo "<script>alert('用户名和密码不能为空！');history.go(-1);</script>";
}else{ 
  $username=$_POST["username"];
  $pass=$_POST["pass"];
  $sqltest="select * from tb_meeting_user where userName='$username'";                   //判断登录用户名是否存在
  $testrst=$conn->Execute($sqltest);                                                     //执行查询操作
  if(!$testrst->EOF){
    $sqlstr="select * from tb_meeting_user where userName='$username' and userPassword='$pass'";
    $rst=$conn->Execute($sqlstr);
      if(!$rst->EOF){                                                                    //判断登录用户名和密码是否正确
	    if($rst->fields[6]==0){                                                          //判断登录用户是否被冻结
          $_SESSION["id"]=$rst->fields[0];                                               //赋值给SESSION变量
          $_SESSION["name"]=$rst->fields[1];
          $_SESSION["rights"]=$rst->fields[5];
		  $_SESSION["lasttime"]=$rst->fields[3];                                      
		  $logindate=date("Y-m-d ").date("G:i:s");                                       //当前登录时间
		  $logincount=$rst->fields[4];                                                   //当前登录次数             
		  $logincount++;                                                                 //登录次数自增1
	      $sqlstrud="update tb_meeting_user set userLoginCount=$logincount,userLastLoginDate='$logindate' where userId = $_SESSION[id]";   //更新登录次数和时间
		  $conn->Execute($sqlstrud);
          echo "<meta http-equiv=\"refresh\" content=\"2;url=manager.php\" />";
		  echo "<center><img src='images/loginwait.jpg' width='1003' height='636' /></center>";
		  }else if($rst->fields[6]==1){
		  echo "<script>alert('该用户帐号已被冻结 请联系管理员！');history.go(-1);</script>";
		  }
      }else{
        echo "<script>alert('密码错误，请重新登录。');history.go(-1);</script>";
      }
  }else{
  echo "<script>alert('该用户名不存在！，请重新登录。');history.go(-1);</script>";
 }
}

?>
