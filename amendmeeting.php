<?php
//session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/add_meeting.js"></script>
<style type="text/css">
*{margin:0; padding:0; font-size:12px;}
body{text-align:center; background:#FFFFCC;}
h3{ font-size:18px;}
.input2{ width:170px; border:1px solid #CCCCCC;}
.amendmeeting{ margin:15px auto; width:610px;}
.btn1{border:none; width:48px; height:20px; background:url(images/modify.jpg)}
.btn2{border:none; width:48px; height:20px; background:url(images/cancel.jpg);}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<script language="javascript">
function meeting_chk(){
	if(amendmeeting.meeting_name.value==""){
		alert("������ԭ���룡");insertpwd.olderpwd.focus();return false;
	}
	found.submit();
}
</script>

<div class="amendmeeting">
<?php
$id=$_GET["id"];
$sqlstrupdate="select * from tb_meeting_info where meeting_id=$id";
$rst_update = $conn->execute($sqlstrupdate);

?>
<table cellpadding="0" cellspacing="0" border="0">
<form id="amendmeeting" name="theForm" action="amendmeeting_chk.php" method="post" onSubmit="return check_submit();">
 <tr><td colspan="2" height="26"><h1 align="center">�޸Ļ����¼</h1><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
 <tr>
   <td width="120" height="26"><div align="center">��������:</div></td>
   <td><input class="input2"  type="text" name="meeting_name"  value="<?php echo $rst_update->fields[1]; ?>"/></td>
 </tr>
 <tr>
   <td height="26"><div align="center">��������:</div></td>
   <td>
     <div align="left">
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
       </div></td>
 </tr>
 <tr>
   <td height="26"><div align="center">����ص�:</div></td>
   <td><input class="input2" type="text" name="meeting_place"  value="<?php echo $rst_update->fields[3]; ?>"/></td>
 </tr>
 <tr>
   <td height="26"><div align="center">��������:</div></td>
   <td>
   <select name="b_y">
   <?php 
   for($i=2010;$i<2020;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��
   <select name="b_m">
   <?php 
   for($i=1;$i<13;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��
   <select name="b_d">
   <?php 
   for($i=1;$i<32;$i++){
   echo "<option value=".$i.">".$i."";
   }
   ?>
   </select>��   </td>
 </tr>
 <tr>
   <td height="26"><div align="center">����������:</div></td>
   <td><input class="input2" type="text" name="meeting_host"  value="<?php echo $rst_update->fields[5];?>"/></td>
 </tr>
 <tr>
   <td height="26"><div align="center">�����¼��:</div></td>
   <td><input class="input2" type="text" name="meeting_saver"  value="<?php echo $rst_update->fields[7];?>" /></td>
 </tr>
 <tr>
   <td height="26"><div align="center">��ϯ��Ա:</div></td>
   <td><input class="input2" type="text" name="meeting_present"  value="<?php echo $rst_update->fields[6];?>" /></td>
 </tr>
 <tr>
   <td height="72"><div align="center">����ժҪ:</div></td>
   <td><textarea class="input2" name="textarea" rows="4"><?php echo $rst_update->fields[8];?></textarea></td>
 </tr>
 <tr>
 <td colspan="2"><center><input class="btn1" type="submit" value=""/>&nbsp;&nbsp;<input class="btn2" type="reset" value="" /></center></td>
 </tr>
</form>
</table>
</div>
</body>
</html>
