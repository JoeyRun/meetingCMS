<?php 
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����¼��ӡ</title>
<link href="css/printwindow.css" type="text/css" rel="stylesheet" />
</head>
<script>     
  function printview(){     
  document.all.WebBrowser1.ExecWB(7,1);
  window.close();  
  }     
  function prints(){     
  document.all.WebBrowser1.ExecWB(6,1);
  window.close();  
  } 
 </script> 
<object   ID='WebBrowser1'   WIDTH=0   HEIGHT=0   CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
<?php
if(isset($_POST["printview"]) && $_POST["printview"]=="��ӡԤ��"){;
 ?>
<body topmargin="0" leftmargin="0" bottommargin="0" onLoad="printview();">
<?php
}else if(isset($_POST["print"]) && $_POST["print"]=="��ӡ"){
?>
<body topmargin="0" leftmargin="0" bottommargin="0" onLoad="prints();">
<?php
}
?>
<?php
$id=$_POST["id"];
$sqlstriii="select * from tb_meeting_info where meeting_id =$id";
$s_rst=$conn->Execute($sqlstriii);
?>
<div class="infoshow">
<table width="560" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="4" align="center"><h3 class="htt">���տƼ����޹�˾�����¼����</h3></td></tr>
  <tr>
    <td width="134"><div align="right">�����ţ�</div></td>
    <td width="340" align="left"><?php echo $s_rst->fields[0]?>
    <div align="left"></div></td>
    <td width="135"><div align="right">�������ƣ�</div></td>
    <td width="341" align="left"><?php echo $s_rst->fields[1]?></td>
  </tr>
  <tr>
    <td><div align="right">�������ƣ�</div></td>
    <td align="left"><?php echo $s_rst->fields[2]?></td>
    <td><div align="right">����ص㣺</div></td>
    <td align="left"><?php echo $s_rst->fields[3]?></td>
  </tr>
  <tr>
    <td><div align="right">�������ڣ�</div></td>
    <td align="left"><?php echo $s_rst->fields[4]?></td>
    <td><div align="right">���������ˣ�</div></td>
    <td align="left"><?php echo $s_rst->fields[5]?></td>
  </tr>
  <tr>
    <td><div align="right">��ϯ��Ա��</div></td>
    <td align="left"><?php echo $s_rst->fields[6]?></td>
    <td><div align="right">�����¼�ˣ�</div></td>
    <td align="left"><?php echo $s_rst->fields[7]?></td>
  </tr>
  <tr>
    <td><div align="right">����ժҪ��</div></td>
    <td colspan="3"><div align="left"><?php echo $s_rst->fields[8]?></div></td>
  </tr>
  
  <tr>
    <td height="23"><div align="right">�������ݣ�</div></td>
    <td height="23" colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td height="200" colspan="4">
	<div class="content">
	<?php
	$address=$s_rst->fields[9];
	$myfile=fopen("$address","r");
	$myline=fgets($myfile);
	echo $myline;
	fclose($myfile);
	?>
	</div></td>
  </tr>
  <tr>
    <td colspan="4" align="center"></td>
  </tr>
</table>
</body>
</html>
