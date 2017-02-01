<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/departmanager.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>部门管理</title>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0">
  <tr>
     <td bgcolor="#CCCCCC" width="60">部门ID</td>
	 <td bgcolor="#CCCCCC" width="100">部门名称</td>
	 <td bgcolor="#CCCCCC" width="60">操作</td>
  </tr>
<?php
$sqldep="select * from tb_meeting_depart";
$dep_rst=$conn->Execute($sqldep);
while(!$dep_rst->EOF){
?>
<form action="deldepart.php?id=<?php echo $dep_rst->fields[0]; ?>" method="post">
<tr>
  <td height="26"><?php echo $dep_rst->fields[0]; ?></td>
  <td><?php echo $dep_rst->fields[1]; ?></td>
  <td><input class="btn1" type="submit" value="" /></td>
</tr>
</form>
<?php
$dep_rst->movenext();
}
?>
<tr><td height="32" colspan="2" align="right"><span style="color:#FF0000">增加部门>>></span></td><td><a href="#" onclick="javascript:Wopen=open('adddepart.php','','height=320,width=400,scrollbars=no');"><img src="images/append_15.jpg" width="48" height="20" border="0" alt="修改"></a></td></tr>
</table>
</body>
</html>
