<?php
header("Content-type:application/vnd.ms=excel");
header("Content-Disposition:filename=���鱨��.xls");
//session_start();
?>
<table border="1" cellpadding="0" cellspacing="0">
<tr>
    <td bgcolor="#CCCCCC" align="center" width="80">������</td>
    <td bgcolor="#CCCCCC" align="center" width="100">��������</td>
    <td bgcolor="#CCCCCC" align="center" width="100">��������</td>
    <td bgcolor="#CCCCCC" align="center" width="150">����ص�</td>
    <td bgcolor="#CCCCCC" align="center" width="100">��������</td>
    <td bgcolor="#CCCCCC" align="center" width="85">������</td>
    <td bgcolor="#CCCCCC" align="center" width="200">��ϯ��Ա</td>
    <td bgcolor="#CCCCCC" align="center" width="160">��¼��</td>
    <td bgcolor="#CCCCCC" align="center" width="220">����ժҪ</td>
  </tr>
<?php
include_once("conn/conn.php");
$sqlstriv="select * from tb_meeting_info";
$f_rst = $conn->Execute($sqlstriv);
while(!$f_rst->EOF){
?>
 <tr>
    <td height="22" align="left"><?php echo $f_rst->fields[0]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[1]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[2]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[3]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[4]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[5]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[6]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[7]; ?></td>
    <td height="22" align="left"><?php echo $f_rst->fields[8]; ?></td>
 </tr>

<?php
$f_rst->movenext();
}
?>
</table>