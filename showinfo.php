<?php
//session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/showinfo.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
</head>
<body>
<?php
$id=$_GET["id"];
$sqlstriii="select * from tb_meeting_info where meeting_id =$id";
$s_rst=$conn->Execute($sqlstriii);
?>
<div class="infoshow">
<table width="560" border="0" cellspacing="0" cellpadding="0">
<form action="printwindow.php" method="post">
<tr><td colspan="4" align="center"><h3 class="ht">���տƼ����޹�˾�����¼����</h3></td></tr>
  <tr>
    <td width="134"><div align="right">�����ţ�</div></td>
    <td width="340"><?php echo $s_rst->fields[0]?></td>
    <td width="135"><div align="right">�������ƣ�</div></td>
    <td width="341"><?php echo $s_rst->fields[1]?></td>
  </tr>
  <tr>
    <td><div align="right">�������ƣ�</div></td>
    <td><?php echo $s_rst->fields[2]?></td>
    <td><div align="right">����ص㣺</div></td>
    <td><?php echo $s_rst->fields[3]?></td>
  </tr>
  <tr>
    <td><div align="right">�������ڣ�</div></td>
    <td><?php echo $s_rst->fields[4]?></td>
    <td><div align="right">���������ˣ�</div></td>
    <td><?php echo $s_rst->fields[5]?></td>
  </tr>
  <tr>
    <td><div align="right">��ϯ��Ա��</div></td>
    <td><?php echo $s_rst->fields[6]?></td>
    <td><div align="right">�����¼�ˣ�</div></td>
    <td><?php echo $s_rst->fields[7]?></td>
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
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="hidden" name="id"  value="<?php echo $id; ?>"/></td>
  </tr>

</table>
</div>
<div class="printbutton">
  <input  type="submit" value="��ӡԤ��" name="printview" />
&nbsp;&nbsp;
<input type="submit" value="��ӡ"  name="print" />

</form>
</div>
</body>
</html>
