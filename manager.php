<?php
//
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/manager.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������ϵͳ</title>
</head>

<?php
if(empty($_SESSION["name"]) and empty($_SESSION["id"])){                                          //�жϵ�ǰ�û��Ƿ�Ϊ��¼״̬
echo "<script>alert('���¼���ٽ���ִ�в�����');history.go(-1);</script>";
}else{
?>
<body>
<div class="wrapper">
<div>
  <div class="header"><img src="images/Title.png" width="960" height="220" /></div>
  <div class="userinfo">
  <?php include("userinfo.php"); ?>
  </div>
  <div class="main">
  <table cellpadding="0" cellspacing="0" border="0">
   <tr>
      <td width="180">
	    <div class="leftbox">
		<center>
		<h4 class="h4">�������</h4>
		<ul>
		<li><a href="manager.php?lmbs=��ӻ����¼">&nbsp;&nbsp;��ӻ����¼</a></li>
		<li><a href="manager.php?lmbs=��������¼">&nbsp;&nbsp;���������Ϣ</a></li>
		<li><a href="manager.php?lmbs=���һ����¼">&nbsp;&nbsp;���һ����¼</a></li>
		<li><a href="manager.php?lmbs=�����û���Ϣ">&nbsp;&nbsp;�����û���Ϣ</a></li>
		</ul>
		<p>&nbsp;</p>
		<?php 
		if($_SESSION["rights"]==1){
		?>
		<h4 class="h4style">�������</h4>
		<ul>
		<li class="uli"><a href="manager.php?lmbs=�û��ʻ�����">&nbsp;&nbsp;�û��ʻ�����</a></li>   <!--���ɾ�������ʺ�-->
		<li class="uli"><a href="manager.php?lmbs=������Ϣ����">&nbsp;&nbsp;������Ϣ����</a></li>   <!--ɾ�������¼-->
		<li class="uli"><a href="manager.php?lmbs=���Ź���">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;&nbsp;&nbsp;</a></li>       <!--���ɾ������-->
		</ul>
		<?php
		}
		?>
		</center>
		<center>
		<table cellpadding="0" cellspacing="0" border="0">
		  <tr>
		    <td height="50">&nbsp;</td>
		  </tr>
		  <tr>
		    <td height="60"><img src="images/fbook.gif" width="176" height="46" /></td>
		  </tr>
		  <tr>
		    <td height="60"><img src="images/mingrisoft.gif" width="176" height="45"/></td>
		  </tr>
		  <tr>
		    <td height="60"><img src="images/mrbbs.gif"  width="176" height="45"/></td>
		  </tr>
		</table>
		</center>
		</div>
	  </td>
      <td width="784">
	   <div class="rightbox">
	    <div class="position">��ǰλ��>><?php 
		if(empty($_GET["lmbs"])){
		echo "��ҳ";
		}else{
		echo $_GET["lmbs"]; }?></div>
		<div class="include">
	    <?php 
	   if(!isset($_GET["lmbs"]))
	   {
		   $lmbs=0;
	   }
	   else
	   {
		   $lmbs=$_GET["lmbs"];
	   }
       switch($lmbs){
       case "��ӻ����¼":
       include("addmeeting.php");
       break;
       case "��������¼":
       include("viewmeeting.php");
       break;
       case "���һ����¼":
       include("found.php");
	   break;
	   case "�޸�����":
       include("amendpwd.php");
       break;
	   case "���һ�����":
       include("show.php");
       break;
       case "�����û���Ϣ":
       include("amendinfo.php");
       break;
	   case "":
       include("welcome.php");
       break;
	   //����Աģʽѡ��
	   case "�û��ʻ�����":
       include("acc_manager.php");
       break;
	    case "������Ϣ����":
       include("recordmanager.php");
       break;
	    case "���Ź���":
       include("departmanager.php");
       break;
       }
		?>
		</div>
	   </div>
	  </td>
   </tr>
  </table>
  </div>
  <div class="footer">
  <?php
  include("footer.php");
  ?>
  </div>
</div>
</div>
</body>
<?php
}
?>
</html>
