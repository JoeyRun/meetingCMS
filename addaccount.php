<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/addaccount.js"></script>
<link href="css/addaccount.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������û�</title>
</head>
<body>
<div class="main1">
<table cellpadding="0" cellspacing="0" border="0">
<tr><td colspan="2">������û�</td></tr>
<form id="addaccount" action="addaccount_chk.php" method="post" onSubmit="return meeting_chk();">
<tr>
  <td width="60" height="26">�û�����</td><td><input class="input1" type="text" name="newuser" /></td>
</tr>
<tr>
   <td height="26">�������ƣ�</td>
   <td align="left">
       <select name="department">
	   <option>��ѡ����</option>
           <?php 
   $sqlstr="select department_name from tb_meeting_depart";
   $l_rst = $conn->execute($sqlstr);
   while(!$l_rst->EOF){
   ?>
           <option value="<?php echo $l_rst->fields[0]; ?>"><?php echo  $l_rst->fields[0]; ?></option>
            <?php
   $l_rst->movenext();
   }
   ?>
      </select>

   </td>
</tr>
<tr>
  <td  height="26" width="60">���룺</td><td><input class="input1"  type="password" name="newpwd"  /></td>
</tr>
<tr>
  <td>ȷ�����룺</td><td><input class="input1"  type="password" name="newpwdtwice" /></td>
</tr>
<tr>
  <td height="36" colspan="2"><input class="btn1" type="submit" value="" />&nbsp;<input class="btn2" type="reset" value="" /></td>
</tr>
</form>
</table>
</div>
</body>
</html>
