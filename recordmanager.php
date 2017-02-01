<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/recordmanager.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
</head>

<body>
<h3>会议信息管理</h3>

<?php
$sqlview="select * from tb_meeting_info";
$num=2;                                                 //每页显示最大记录数
  if(isset($_GET['n_page'])){	                        //判断当前页码
   $c_page = $_GET[n_page];					            //将$n_page赋给变量$c_apge
  }else{
		$c_page = 1;								    //初始化变量$c_page
	    }
 $l_rst = $conn -> PageExecute($sqlview,$num,$c_page);	//执行pageExecute函数
$rst_view = $conn->execute($sqlview);
$record=count($rst_view->GetRows());                    //获取总记录数
if($record==0){
echo "<span class=\"norecord\">当前没有任何记录</span>";
}else{
?>

<table width="740" border="0" cellspacing="0" cellpadding="0">
  <tr class="tableheader">
    <td width="50">会议编号</td>
    <td width="60">会议名称</td>
    <td width="60">部门名称</td>
    <td width="80">会议地点</td>
    <td width="80">会议日期</td>
    <td width="45">主持人</td>
    <td width="60">出席人员</td>
    <td width="45">记录人</td>
    <td width="120">修改记录</td>
	<td width="60">删除操作</td>
  </tr>
<?php
while(!$l_rst->EOF){
?>

  <tr>
  <form action="deletemeeting.php?id=<?php echo $l_rst->fields[0]; ?>" method="post">
    <td height="26"><?php echo $l_rst->fields[0]; ?></td>
    <td><?php echo $l_rst->fields[1]; ?></td>
    <td><?php echo $l_rst->fields[2]; ?></td>
    <td><?php echo $l_rst->fields[3]; ?></td>
    <td><?php echo $l_rst->fields[4]; ?></td>
    <td><?php echo $l_rst->fields[5]; ?></td>
    <td><?php echo $l_rst->fields[6]; ?></td>
    <td><?php echo $l_rst->fields[7]; ?></td>
    <td><a href="#" onclick="javascript:Wopen=open('amendmeeting.php?id=<?php echo $l_rst->fields[0]; ?>','','height=420,width=604,scrollbars=no');"><img src="images/amend.ico" width="16" height="16" border="0" alt="修改"></a></td>
	<td height="22" align="center"><input class="btn2" type="submit" value="" name="deletemeeting" /></td>
	</form>
  </tr>
<?php
   $l_rst->movenext();
   }

 ?>
</table>
<div>
 
  <font color='#999999'>当前是第<?php echo $l_rst -> absolutePage(); ?>页/一共<?php echo $l_rst -> LastPageNo(); ?>页</font>
<?php


		if(!$l_rst -> AtfirstPage()){					//如果当前页不是首页
?>



<!--  输出向上翻页超链接  -->
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=1" ?>"> 首页 </a>
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() - 1); ?>"> 上一页 </a>
<!--  ----------------------------  -->
<?php
		}
		if(!$l_rst -> AtlastPage()){					//如果当前页不是尾页
?>
<!--  输出向下翻页超链接  -->
		<a href = "<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() + 1); ?>"> 下一页 </a>
		<a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> LastPageNo());?>"> 尾页 </a>	
<!--  -----------------------------  -->

<?php
		}
}
?>
</div>
</body>
</html>
