<?php

//session_start();
//fixed:A session had already been started - ignoring session_start()
if(!isset($_SESSION)){
    session_start();
}
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/userinfo.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��½��Ϣ</title>
<script type="text/JavaScript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
</script>
</head>
<body>
<script type="text/javascript">
function logout(){
	if(confirm("ȷ��Ҫ�˳���¼�� ")){				//���ѡ����û����Ե�����ȷ�ϡ���ȡ������ť
		window.open('logout.php','_parent','',false);	//����û�ȷ���˳������logout.phpҳ
	}else
     return false;  
}

</script>
<div class="userinfo1">
<?php
$sqlstrvi="select * from tb_meeting_user where userId=$_SESSION[id]";
$i_rstuser=$conn->Execute($sqlstrvi);
?>
<table cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="58" align="center">�𾴵ģ�</td>
	<td width="48" align="left"><?php echo $i_rstuser->fields[1]; ?></td>
	<td width="68">������ݣ�</td>
	<td width="78" align="left">
	<?php if($i_rstuser->fields[5]==0)
       echo "<span style=\"color:#CC99FF\">��ͨ�û�</span>";
	   else if($i_rstuser->fields[5]==1)
	   echo "<span style=\"color:#FF0000\">����Ա</span>";	
	?></td>
	<td>��ǰ����Ϊ��<span class="dates"><?php echo date("Y��m��d��");?></span>&nbsp;</td>
	<td width="78">�ϴε�¼ʱ��:</td>
	<td width="138"><?php 
	if($i_rstuser->fields[4]==1){
	echo "------";
    }else{
	echo $_SESSION["lasttime"]; 
	}
	?>
	</td>
	<td width="40" >��ǰΪ</td>
	<td width="100" align="left">��&nbsp;<?php echo $i_rstuser->fields[4]; ?>&nbsp;�ε�¼</td>
	<!--<td width="51"><a href="logout.php">�˳���½</a></td>-->
	<td width="51"><a href="logout.php"><img src="images/over3.png" width="49" height="19" border="0"  onclick="logout()" /></a></td>
  </tr>
</table>
</div>
</body>
</html>
