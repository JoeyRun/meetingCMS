<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/adddepart.js"></script>
<link href="css/adddepart.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加部门</title>
</head>
<body>
<div class="add_dpt">
<form id="adddepart"action="adddepart_chk.php" method="post" onSubmit="return check_submit();">
 <table cellpadding="0" cellspacing="0" border="0">
   <tr><td height="26" colspan="2" align="center"><h3>添加部门</h3></td></tr>
   <tr><td>新部门名称：</td><td height="26"><input type="text"  name="departname"/></td></tr>
   <tr><td height="26" colspan="2" align="center"><input class="btn1" type="submit" value="" /></td></tr>
 </table>
</form>
</div>
</body>
</html>
