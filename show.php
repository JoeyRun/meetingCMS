<?php
session_start();
include_once("conn/conn.php");
$char=$_POST["characters"];
$type=$_POST["findtype"];
if($type==0){
echo "<script>alert('��ѡ��������ͣ�');history.go(-1);</script>";
} else if($type==1){
$sqlstrv="select * from tb_meeting_info where meeting_id=$char";                  //�������Ų���;
}else if($type==2){
$sqlstrv="select * from tb_meeting_info where meeting_name like '%".$char."%'";   // ���������Ʋ���;
}
$rst_find = $conn->execute($sqlstrv);
$record=count($rst_find->GetRows()); 
if($record==0){
echo "û��ƥ��Ĳ�ѯ�����";
}else{
?>
<h3>������Ϣ���</h3>
<table width="730" border="0" cellspacing="0" cellpadding="0">
  <tr class="tableheader">
    <td width="50">������</td>
    <td width="60">��������</td>
    <td width="60">��������</td>
    <td width="80">����ص�</td>
    <td width="80">��������</td>
    <td width="45">������</td>
    <td width="60">��ϯ��Ա</td>
    <td width="45">��¼��</td>
    <td width="120">����ժҪ</td>
	<td width="60">�鿴����</td>
  </tr>
 <?php 
 while(!$rst_find->EOF){
 ?>
 <tr>
    <td height="22"><?php echo $rst_find->fields[0]; ?></td>
    <td height="22"><?php echo $rst_find->fields[1]; ?></td>
    <td height="22"><?php echo $rst_find->fields[2]; ?></td>
    <td height="22"><?php echo $rst_find->fields[3]; ?></td>
    <td height="22"><?php echo $rst_find->fields[4]; ?></td>
    <td height="22"><?php echo $rst_find->fields[5]; ?></td>
    <td height="22"><?php echo $rst_find->fields[6]; ?></td>
    <td height="22"><?php echo $rst_find->fields[7]; ?></td>
    <td height="22"><?php echo $rst_find->fields[8]; ?></td>
	<td height="22" align="center"><a href="#" onclick="javascript:Wopen=open('showinfo.php?id=<?php echo $rst_find->fields[0]; ?>','','height=720,width=1004,scrollbars=no');"><img src="images/xiazai.gif" width="26" height="18" border="0" alt="����"></a></td>
  </tr>
<?php
   $rst_find->movenext();
   }  
 ?>
</table>
<?php
}
?>