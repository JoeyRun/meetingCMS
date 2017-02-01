<?php
session_start();
include_once("conn/conn.php");
$char=$_POST["characters"];
$type=$_POST["findtype"];
if($type==0){
echo "<script>alert('请选择查找类型！');history.go(-1);</script>";
} else if($type==1){
$sqlstrv="select * from tb_meeting_info where meeting_id=$char";                  //按会议编号查找;
}else if($type==2){
$sqlstrv="select * from tb_meeting_info where meeting_name like '%".$char."%'";   // 按会议名称查找;
}
$rst_find = $conn->execute($sqlstrv);
$record=count($rst_find->GetRows()); 
if($record==0){
echo "没有匹配的查询结果！";
}else{
?>
<h3>会议信息浏览</h3>
<table width="730" border="0" cellspacing="0" cellpadding="0">
  <tr class="tableheader">
    <td width="50">会议编号</td>
    <td width="60">会议名称</td>
    <td width="60">部门名称</td>
    <td width="80">会议地点</td>
    <td width="80">会议日期</td>
    <td width="45">主持人</td>
    <td width="60">出席人员</td>
    <td width="45">记录人</td>
    <td width="120">会议摘要</td>
	<td width="60">查看详情</td>
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
	<td height="22" align="center"><a href="#" onclick="javascript:Wopen=open('showinfo.php?id=<?php echo $rst_find->fields[0]; ?>','','height=720,width=1004,scrollbars=no');"><img src="images/xiazai.gif" width="26" height="18" border="0" alt="详情"></a></td>
  </tr>
<?php
   $rst_find->movenext();
   }  
 ?>
</table>
<?php
}
?>